<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Reto extends Component
{
    public $reto, $plan, $list_id, $data, $name, $email, $terms = true, $error_message = false;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'terms' => 'accepted'
    ];

    public function mount($reto) {
        $this->reto = $reto;
        switch ($reto) {
            case '7-dias':
                $this->plan = Plan::find(7);
                $this->list_id = 15;
            break;
            case 'navidad':
                $this->plan = Plan::find(17);
                $this->list_id = 15;
                break;
            case 'desafio':
                    $this->plan = Plan::find(18);
                    $this->list_id = 18;
                    break;
            case 'empareja2':
                $this->plan = Plan::find(19);
                $this->list_id = 18;
                break;
            case '5mer':
                $this->plan = Plan::find(36);
                $this->list_id = 34;
                break;
            case 'quedese-keto':
                $this->plan = Plan::find(47);
                $this->list_id = 34;
                break;
            case 'desafio-2023':
                $this->plan = Plan::find(49);
                $this->list_id = 34;
                break;
            case 'empareja2-2023':
                $this->plan = Plan::find(50);
                $this->list_id = 34;
                break;
                
            default:
                $this->list_id = null;
                break;
        }
    }

    public function masterclassData($reto)    {
        switch ($reto) {
            case '7-dias':
                return $this->data = [
                    'title' => 'Reto 7 Días Keto',
                    'subtitle'=> 'Doctor Bayter',
                    'type' => 'Reto Online',
                    'online' => true,
                    'billdoard' => null,
                    'video' => null,
                ];
            break;
            case 'navidad':
                return $this->data = [
                    'title' => 'Reto 7 días Navidad',
                    'subtitle'=> 'Doctor Bayter',
                    'type' => 'Reto Online',
                    'online' => true,
                    'billdoard' => null,
                    'video' => null,
                ];
            break;
            case 'desafio':
                return $this->data = [
                    'title' => 'Desafio 2022',
                    'subtitle'=> 'Libérate de la mierda del 2021',
                    'type' => 'Reto Online',
                    'online' => true,
                    'billdoard' => null,
                    'video' => null,
                ];
            break;
            case 'empareja2':
                return $this->data = [
                    'title' => 'Empareja2',
                    'subtitle'=> 'Justos es más fácil',
                    'type' => 'Reto Online',
                    'online' => true,
                    'billdoard' => null,
                    'video' => null,
                ];
            break;
            case '5mer':
                return $this->data = [
                    'title' => '5MER',
                    'subtitle'=> 'El reto del ayuno',
                    'type' => 'Reto Online',
                    'online' => true,
                    'billdoard' => null,
                    'video' => null,
                ];
            break;
            case 'quedese-keto':
                return $this->data = [
                    'title' => '#QuedeseKeto',
                    'subtitle'=> 'El reto en Navidad',
                    'type' => 'Reto Online',
                    'online' => true,
                    'billdoard' => null,
                    'video' => null,
                ];
            break;
            case 'desafio-2023':
                return $this->data = [
                    'title' => 'Desafio 2023',
                    'subtitle'=> 'Liberate de la mierda de 2022',
                    'type' => 'Reto Online',
                    'online' => true,
                    'billdoard' => null,
                    'video' => null,
                ];
            break;
            case 'empareja2-2023':
                return $this->data = [
                    'title' => 'Empareja2 2023',
                    'subtitle'=> 'Porque juntos es más fácil',
                    'type' => 'Reto Online',
                    'online' => true,
                    'billdoard' => null,
                    'video' => null,
                ];
            break;
            default:
                return null;
                break;
        }
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function render() {
        switch ($this->reto) {
            case '7-dias':
                return view('livewire.reto.7-dias.register');
            break;
            case 'navidad':
                return view('livewire.reto.7-dias.register');
            break;
            case 'desafio':
                return view('livewire.reto.desafio.register');
            break;
            case 'empareja2':
                return view('livewire.reto.empareja2.register');
            break;
            case '5mer':
                return view('livewire.reto.5mer.register');
            break;
            case 'quedese-keto':
                return view('livewire.reto.quedese-keto.register');
            break;
            case 'desafio-2023':
                return view('livewire.reto.desafio-2023.register');
            break;
            case 'empareja2-2023':
                return view('livewire.reto.empareja2-2023.register');
            break;
            default:
                return view('livewire.masterclass.no-disponible');
                break;
        }
    }

    public function confirmData() {
        $this->validate();
        if($this->activeCampaign()) {
            return redirect()->route('masterclass.thanks', ['masterclass'=>$this->reto , 'data'=>$this->data]);
        } else {
            $this->error_message = true;
        }
    }

    public function retoData($reto)    {
        switch ($reto) {
            case 'desafio':
                return $this->data = [
                    'title' => 'Reunión de Zoom',
                    'subtitle'=> 'Desafio Liberate de la mierda del 2021',
                    'type' => 'Repetición',
                    'online' => true,
                    'video-1' => '665248310?h=e1e1892609',
                    'video-2' => '666617173?h=5e7e646237'
                ];
                break;
            case 'empareja2':
                return $this->data = [
                    'title' => 'Reto Empareja2',
                    'subtitle'=> 'Juntos es mejor',
                    'type' => 'video',
                    'online' => true,
                    'video-1' => '695887964?h=1cfe264a57',
                    'video-2' => '697568971?h=b85e95db54',
                    'video-title' => 'Video receta Caldo Volador',
                    'video-base' => '694725486?h=f2f6142350',
                ];
                break;
            case '5mer':
                return $this->data = [
                    'title' => 'Reto 5Mer',
                    'subtitle'=> 'El Reto del Ayuno',
                    'type' => 'video',
                    'online' => true,
                    'video-1' => '742122050?h=1db77369c6',
                    'video-2' => '743582485?h=f12a6f8d00',
                    'video-title' => 'Video Intro del Reto',
                    'video-base' => '741120862?h=7eb0af9670',
                ];
                break;
            case 'quedeseketo':
                return $this->data = [
                    'title' => 'Reto #QuedeseKeto',
                    'subtitle'=> 'El Reto de Navidad',
                    'type' => 'video',
                    'online' => true,
                    'video-1' => '780536061?h=989bb4de5c',
                    'video-2' => '781982023?h=0c5827a293',
                    'video-title' => '',
                    'video-base' => '',
                ];
                break;
            case 'desafio-2023':
                return $this->data = [
                    'title' => 'Desafio 2023',
                    'subtitle'=> 'Liberate de la mierda de 2022',
                    'type' => 'Video Base del Desafio',
                    'online' => true,
                    'video-1' => '788054919?h=af162e0938',
                    'video-2' => '789144068?h=1a835fc0e1',
                    'video-consome-title' => 'Consomé',
                    'video-consome' => '787251863?h=a00d345c0c',
                    'video-salsa-title' => 'Salsa Cremosa',
                    'video-salsa' => '787252511?h=71fab4406b',
                ];
                break;
            case 'empareja2-2023':
                return $this->data = [
                    'title' => 'Empareja2 2023',
                    'subtitle'=> 'Juntos es más fácil',
                    'type' => 'Video Marinado de Proteinas',
                    'online' => true,
                    'video-1' => '836031302?h=818a0b4c9c',
                    'video-2' => '837062193?h=580d2642aa',
                    'video-marinado-title' => 'Marinado',
                    'video-marinado' => '834819582?h=fe6d71b049',
                    'video-consome-title' => 'Consomé',
                    'video-consome' => '787251863?h=a00d345c0c',
                    'video-salsa-title' => 'Salsa Cremosa',
                    'video-salsa' => '787252511?h=71fab4406b',
                ];
                break;
            default:
                return null;
                break;
        }
    }

    public function replay($reto, $day) {
        $this->reto = $reto;
        $data = $this->retoData($reto);

        return view('livewire.reto.replay', ['reto'=>$this->reto,  'day'=>$day, 'data'=>$data]);
    }

    public function video($reto, $video) {
        $this->reto = $reto;
        $data = $this->retoData($reto);

        return view('livewire.reto.video', ['reto'=>$this->reto, 'data'=>$data, 'video'=>$video]);
    }

    public function thanks($reto) {

        $data = $this->retoData($reto);

        return view('livewire.masterclass.thanks', ['masterclass'=>$reto, 'data'=>$data]);
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
                       return false;
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
