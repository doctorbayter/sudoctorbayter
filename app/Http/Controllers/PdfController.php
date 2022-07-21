<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use TCPDF;

class PdfController extends Controller
{
    public function generatePdf(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();

        if($user){
            $plan = Subscription::where('user_id', $user->id)
            ->whereIn('plan_id', [20, 21, 22, 26, 28, 29, 30])
            ->first();

            if(!$plan){
                return "No hemos podido generar tu certificado";
            }

        }else{
            return "El usuario no existe en nuestra base de datos";
        }


        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator('Media Social Academy');
        $pdf->SetAuthor('Jeff Cote');
        $pdf->SetTitle('Certificado de finalzación');
        $pdf->SetSubject('evento '. 'REVOLUCIÓN');
        $pdf->SetKeywords('PDF', 'evento', 'REVOLUCIÓN');
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        // set margins
        $pdf->SetMargins(45, 25, 45);
        $pdf->SetHeaderMargin(0);
        $pdf->SetFooterMargin(0);
        // remove default footer
        $pdf->setPrintFooter(false);
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        // set font
        $pdf->SetFont('helvetica');
        // remove default header
        $pdf->setPrintHeader(false);
        // add a page
        $pdf->AddPage();
        // get the current page break margin
        $bMargin = $pdf->getBreakMargin();
        // disable auto-page-break
        $pdf->SetAutoPageBreak(false, 0);
        // set bacground image
        $img_file = asset('/img/events/certificate/certificate_template.jpg');
        $pdf->Image($img_file, 0, 0, 295, 210, '', '', '', false, 300, '', false, false, 0);
        // set the starting point for the page content
        $pdf->setPageMark();


        $date = "16 de julio de 2022";
        // Print a text
        $html = <<<EOF
        <style>
            .title {
                text-align: center;
                color: #fff;
                font-family: times;
                font-size: 40pt;
                letter-spacing: 1px;
            }
            .message {
                text-align: center;
                font-size: 22pt;
                color: #666666;
            }

            .signature{
                text-align: center;
                line-height: 0.4;
            }
            .signature_line{
                color: #666666;
            }
            .signature_subline{
                line-height: 0.75;
                font-size: 12pt;
                color:#999999;
            }
            .signature_name{
                color: #666666;
                font-size: 16pt;
                font-family: times;
            }
        </style>
        <div>
            <h1 class="title"><i>Certificado de Participación</i></h1>
            <p></p>
            <p class="message">&nbsp;<br/><i>Este documento certifica a <b> $user->name </b> como participante oficial de evento 'REVOLUCIÓN' tu salud a otro nivel el día $date</i></p>
            <p></p><p></p>
            <table class="signatures">
                <tbody>
                    <tr>
                    <td>
                        <div class="signature">
                        <h2 class="signature_name"><i>Alejandro Perez</i></h2>
                        <p class="signature_line">______________</p>
                        <p class="signature_subline" >Conferencista</p>
                        </div>
                    </td>
                    <td>
                        <div class="signature">
                        <h2 class="signature_name"><i>Jorge E. Bayter</i></h2>
                        <p class="signature_line">______________</p>
                        <p class="signature_subline" >Conferencista</p>
                        </div>
                    </td>
                    <td>
                        <div class="signature">
                        <h2 class="signature_name"><i>Daniela Ospina</i></h2>
                        <p class="signature_line">______________</p>
                        <p class="signature_subline" >Conferencista</p>
                        </div>
                    </td>
                    <td>
                        <div class="signature">
                        <h2 class="signature_name"><i>Endika Montiel</i></h2>
                        <p class="signature_line">______________</p>
                        <p class="signature_subline" >Conferencista</p>
                        </div>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
        EOF;
        $pdf->writeHTML($html, true, false, true, false, '');
        //Close and output PDF document
        $pdf->Output('certificado-evento-revolucion.pdf', 'I');
    }
}
