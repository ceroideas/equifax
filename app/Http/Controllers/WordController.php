<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PostalCode;
use App\Models\Party;
use App\Models\Type;
use App\Models\Claim;

use App\Imports\PartyImport;
use App\Imports\PostalCodeImport;
use App\Imports\TypeImport;

use Carbon\Carbon;

use Excel;
use DB;

class WordController extends Controller
{
    //

    public function exportTemplate($id)
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $phpWord->setDefaultFontName('Times New Roman');
        $phpWord->setDefaultFontSize('12');
        \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);

        /**/

        $section = $phpWord->addSection();

        $footer = $section->addFooter();
        $footer->addPreserveText('{PAGE}',null, ['alignment' => 'right']);

        $claim = Claim::find($id);

        $pc = PostalCode::where('code',$claim->debtor->cop)->first();

        $type = Type::where('locality',$pc->province)->first();

        $juzgado = "--";
        $procurador = "--";

        if ($type) {
            $juzgado = $type->type;

            $party = Party::where('locality',$pc->province)->first();

            if ($party) {
                $procurador = $party->procurator;
            }
        }

        $html = view('template1', compact('juzgado','procurador','claim','pc'))->render();

        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);

        $section = $phpWord->addSection();
        $section->addText('ÍNDICE DE DOCUMENTOS',['name' => 'Times New Roman', 'size' => 12, 'bold'=> true],['alignment' => 'center']);
        $section->addText('Documento nº1: Poder General para pleitos');
        $section->addText('Documento nº2: Contrato de colaboración profesional de asesoría y gestoría');
        $section->addText('Documento nº3: Facturas impagadas');
        $section->addText('Documento nº4: Burofax remitido');
        $section->addText('Documento nº5: Justificante de recepción del burofax');


        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $name = 'DDA MONITORIO DIVIDAE __'.$claim->id.'__'.Carbon::now()->format('d-m-Y_H_i').'.docx';
        $objWriter->save(public_path().'/documents/'.$name);
        return response()->download(public_path().'/documents/'.$name);
    }

    public function importParty(Request $r)
    {

        \App\Models\Party::truncate();
        if ($r->hasFile('file')) {
            $r->file->move(public_path().'/uploads/excel','partys.xlsx');
            Excel::import(new PartyImport, public_path().'/uploads/excel/partys.xlsx');
        }

        return back()->with('msj','Se ha cargado correctamente el archivo excel!');
    }

    public function importPostalCode(Request $r)
    {
        \App\Models\PostalCode::truncate();
        if ($r->hasFile('file')) {
            $r->file->move(public_path().'/uploads/excel','postal_codes.xlsx');
            Excel::import(new PostalCodeImport, public_path().'/uploads/excel/postal_codes.xlsx');
        }

        return back()->with('msj','Se ha cargado correctamente el archivo excel!');
    }

    public function importType(Request $r)
    {
        \App\Models\Type::truncate();
        if ($r->hasFile('file')) {
            $r->file->move(public_path().'/uploads/excel','types.xlsx');
            Excel::import(new TypeImport, public_path().'/uploads/excel/types.xlsx');
        }

        return back()->with('msj','Se ha cargado correctamente el archivo excel!');
    }
    public function loadPostalCodes(Request $r)
    {
        if ($r->q) {
            return PostalCode::where('code','like',$r->q.'%')->select('id',DB::raw("CONCAT(code,' - ',province) AS text"))->get();
        }
        return [];
    }

    public function savePostalCode(Request $r)
    {
        $c = Claim::find($r->id);
        $c->postal_code_id = $r->postal_code_id;
        $c->save();
        $pc = PostalCode::find($r->postal_code_id);

        $c->debtor->cop = $pc->code;
        $c->debtor->save();

        $type = Type::where('locality',$pc->province)->first();

        $juzgado = "--";
        $procurador = "--";

        if ($type) {
            $juzgado = $type->type;

            $party = Party::where('locality',$pc->province)->first();

            if ($party) {
                $procurador = $party->procurator;
            }
        }

        return [$juzgado,$procurador];
    }
}
