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
                    'type' => 'Masterclass',
                    'billdoard' => null,
                    'video' => '596134885?h=c36783dde8'
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
            default:
                return view('livewire.masterclass.no-disponible');
                break;
        }
    }

    public function confirmData() {
        $this->validate();
        if($this->activeCampaign()) {
            return redirect()->route('masterclass.thanks', ['masterclass'=>$this->masterclass , 'data'=>$this->data]);
        } else {
            $this->error_message = true;
        }
    }

    public function replay($masterclass) {

        $data = $this->masterclassData($masterclass);

        return view('livewire.masterclass.replay', ['masterclass'=>$this->masterclass , 'data'=>$data]);
    }

    public function thanks($masterclass) {


        $data = $this->masterclassData($masterclass);

        return view('livewire.masterclass.thanks', ['masterclass'=>$masterclass, 'data'=>$data]);
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
