<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Masterclass extends Component
{
    public $masterclass, $list_id, $data, $name, $email, $terms = true, $error_message = false;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'terms' => 'accepted'
    ];

    public function mount($masterclass) {
        $this->$masterclass = $masterclass;
        switch ($masterclass) {
            case 'dkp':
                $this->list_id = 15;
                break;
            case 'reto-4':
                $this->list_id = 14;
                break;
            case 'camus':
                    $this->list_id = 19;
                    break;
            default:
                $this->list_id = null;
                break;
        }
    }

    public function masterclassData($masterclass)    {
        switch ($masterclass) {
            case 'dkp':
                return $this->data = [
                    'title' => 'Dieta Keto',
                    'subtitle'=> 'Método DKP - Doctor Bayter',
                    'type' => 'Taller online',
                    'online' => true,
                    'billdoard' => null,
                    'video' => '596134885?h=c36783dde8'
                ];
                break;
            case 'reto-4':
                return $this->data = [
                    'title' => 'Desinflama tu cuerpo',
                    'subtitle'=> 'en solo 4 días',
                    'online' => false,
                    'type' => 'Reto Online',
                    'billdoard' => null,
                    'video' => '596134885?h=c36783dde8'
                ];
                break;
            case 'camus':
                return $this->data = [
                    'title' => 'Desinflama tu cuerpo',
                    'subtitle'=> 'en solo 4 días',
                    'online' => false,
                    'type' => 'Masterclass',
                    'billdoard' => null,
                    'video' => '596134885?h=c36783dde8'
                ];
                break;
            case 'ptem':
                return $this->data = [
                    'title' => 'Predice tu Enfermedad Metabólica',
                    'subtitle'=> 'Una mirada a tus exámenes más allá de los números',
                    'online' => false,
                    'type' => 'Masterclass',
                    'billdoard' => null,
                    'video' => ''
                ];
                break;
            default:
                return null;
                break;
        }
    }

    /*public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }*/

    public function render() {
        switch ($this->masterclass) {
            case 'dkp':
                return view('livewire.masterclass.dkp.register');
                break;
            case 'reto-4':
                return view('livewire.masterclass.reto-4.register');
                break;
            case 'camus':
                return view('livewire.masterclass.reto-4.register');
                break;
            case 'ptem':
                return view('livewire.masterclass.ptem.register');
                break;
            default:
                return view('livewire.masterclass.no-disponible');
                break;
        }
    }

    public function confirmData() {

        $this->email = trim($this->email);

        $this->validate();
        if($this->activeCampaign()) {
            return redirect()->route('masterclass.thanks', ['masterclass'=>$this->masterclass , 'data'=>$this->data]);
        } else {
            $this->error_message = true;
        }
    }

    public function replay($masterclass, $day) {

        $data = $this->masterclassData($masterclass);

        return view('livewire.masterclass.replay', ['masterclass'=>$this->masterclass , 'data'=>$data]);
    }

    public function thanks($masterclass) {


        $data = $this->masterclassData($masterclass);

        return view('livewire.masterclass.thanks', ['masterclass'=>$masterclass, 'data'=>$data]);
    }


    public function reto4Data($reto4)    {
        switch ($reto4) {
            case 'reto-4':
                return $this->data = [
                    'title' => 'Reto desinflama tu cuerpo 4 días',
                    'text'=> '',
                    'billdoard' => null,
                    'video' => null,
                ];
                break;
            case 'camus':
                return $this->data = [
                    'title' => 'Reto desinflama tu cuerpo 4 días',
                    'text'=> '',
                    'billdoard' => null,
                    'video' => null,
                ];
                break;
            default:
                return null;
                break;
        }
    }

    public function reto4DaysData($day)    {
        switch ($day) {
            case 1:
                return $this->data = [

                    'text'=> '<p>Este reto de 4 días lo he diseñado para desinflamar y ponerle fin a esa retención de líquidos que hace que tu célula no funcione bien y te sientas enfermo. Y cuando hablo de desinflamar, no es solo disminuir la hinchazón, es hacerte BAJAR DE PESO.</p><br><p>Te voy a demostrar que en tan solo en 4 días, tu cuerpo se desinflamará, mejorarás tu digestión y le dirás adiós a esos kilos de más que eran solo líquido.</p>',
                    'video' => null,
                ];
                break;
            case 2:
                return $this->data = [
                    'text'=> '<p><b>Recuerda que es MUY importante tomar al menos 3 litros de agua al día, de los cuales al menos 1 debe ser con sal rosada del Himalaya.</b></p>',
                    'video' => null,
                ];
                break;
            case 3:
                return $this->data = [
                    'text'=> '<p>Cada vez estamos más cerca de cumplir nuestro objetivo principal de este reto, <b>Desinflamar nuestro cuerpo y lo mejor, decirle adiós a esos kilos de más que te estaban  ENFERMANDO.</b></p>',
                    'video' => null,
                ];
                break;
            case 4:
                return $this->data = [
                    'text'=> '<p>Hoy darás el último paso en este reto, que a la vez será el primero que te llevará a un nuevo estilo de vida, lleno de energía, más salud,  y lo más importante menos grasa.</p><br><p><b>¿Sabes por qué?</b></p><br><p>Porque si hiciste el Reto día a día y seguiste mis recomendaciones al pie de la letra, comprobaste que comiendo delicioso puedes bajar de peso, aumentar tu energía y ganar salud.</p>',
                    'video' => null,
                ];
                break;

            default:
                return null;
                break;
        }
    }


    public function day($masterclass, $day){

        $data = $this->reto4Data($masterclass);

        $dayData = $this->reto4DaysData($day);


        if($day >0 && $day <=4){
            return view('livewire.masterclass.reto-4.day', ['masterclass' => $this->masterclass, 'day'=> $day, 'day_data' => $dayData, 'data'=> $data]);
        }else{
            return view('no-disponible');
        }

    }


    function splitName($name) {
        $name = trim($name);
        $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $first_name = trim( preg_replace('#'.preg_quote($last_name,'#').'#', '', $name ) );
        return array($first_name, $last_name);
    }

    public function activeCampaign() {

        $response = Http::withHeaders([
            'Api-Token' => 'c1d483a96b0fd0f622ed137c5679b1d97ebd130b09501ab4e1d384e1a4a64ef6c34ff576'
        ]);
        $getUserByEmail = $response->GET('https://doctorbayter.api-us1.com/api/3/contacts/',[
            "email" => $this->email,
            "orders[email]" => "ASC"
        ]);
        $userData = $getUserByEmail['contacts'];

        if($userData){
            $userListsLink = $userData[0]['links']['contactLists'];
            $userId = $userData[0]['id'];

        }else{
            $user_name = $this->splitName($this->name);
            $addUser = $response->POST('https://doctorbayter.api-us1.com/api/3/contacts',[
                "contact" => [
                    "email" => $this->email,
                    "firstName" => $user_name[0],
                    "lastName" => $user_name[1],
                ]
            ]);
            $userListsLink = $addUser['contact']['links']['contactLists'];
            $userId = $addUser['contact']['id'];
        }

        $getUserLists =  $response->GET($userListsLink);

        $userLists = $getUserLists['contactLists'];

        if(count($userLists) > 0) {

            foreach($userLists as $userList ) {



                if($userList['list'] == $this->list_id){

                    if($userList['status'] == 1){
                       //return false;
                       
                       $addUserToList = $response->POST('https://doctorbayter.api-us1.com/api/3/contactLists',[
                            "contactList" => [
                                "list" => $this->list_id,
                                "contact" => $userId,
                                "status" => 1,
                                "sourceid" => 4
                            ]
                        ]);
                        return true;
                        break;

                    }else if($userList['status'] == "2") {
                        $addUserToList = $response->POST('https://doctorbayter.api-us1.com/api/3/contactLists',[
                            "contactList" => [
                                "list" => $this->list_id,
                                "contact" => $userId,
                                "status" => 1,
                                "sourceid" => 4
                            ]
                        ]);
                    }
                    return true;
                    break;
                }else{
                    $addUserToList = $response->POST('https://doctorbayter.api-us1.com/api/3/contactLists',[
                        "contactList" => [
                            "list" => $this->list_id,
                            "contact" => $userId,
                            "status" => 1
                        ]
                    ]);
                }
            }
            return true;

        }else{
            $addUserToList = $response->POST('https://doctorbayter.api-us1.com/api/3/contactLists',[
                "contactList" => [
                    "list" => $this->list_id,
                    "contact" => $userId,
                    "status" => 1
                ]
            ]);
            return true;
        }
    }
}
