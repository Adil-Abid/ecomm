<?php
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Gate;


    function changeDateFormate($date,$date_format){
        return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);    
    }
    
    function rolePermissions($role_id){
        if($role_id){
            $role = Role::find($role_id);
            if($role){
                return $role->permissions->pluck('id')->toArray();
            }
        }
        return [];
    }

    function roleModules($role_id){
        if($role_id){
            $role = Role::find($role_id);
            if($role){
                return $role->modules->pluck('id')->toArray();
            }
        }
        return [];
    }
    

    function userPermissions($user_id){
        if($user_id){
            $user = User::find($user_id);
            if($user){
                return $user->permissions->pluck('id')->toArray();
            }
        }
        return [];
    }

    function userModules($user_id){
        if($user_id){
            $user = User::find($user_id);
            if($user){
                return $user->modules->pluck('id')->toArray();
            }
        }
        return [];
    }




    function hasPermissionTo($permission) {
        if(Auth::user()->hasRole('super-admin')){
            return true;
        }
        $permission = Permission::where('slug' , $permission)->first();
        if($permission){
            return hasPermissionThroughRole($permission) || hasPermission($permission);
        }
        return false;
    }

    function hasPermissionThroughRole($permission) {

        foreach ($permission->roles as $role){
            if(Auth::user()->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    function hasPermission($permission) {

        return (bool) Auth::user()->permissions->where('slug', $permission->slug)->count();
    }


    function userRoleSlug(){
        if(Auth::user()){
            return Auth::user()->roles()->pluck('slug')->first();
        }
        return null;
    }

    function userRoleID($user = null){
        if($user){
          return  $user->roles()->pluck('id')->first();
        }else{
            return (int)Auth::user()->roles()->pluck('id')->first();
        }
        return null;
    }

    function validateEmail($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        } else {
            return false;
        }
    }

    function formatEmailGroups($emailsObject){
        $email_record =[];
        if(isset($emailsObject) &&  count($emailsObject) > 0)
        {
            foreach($emailsObject as $emails){
                $email_record[] = trim($emails->email);
            }
            return implode(',' , $email_record);
        }
        return "";
    }

    function convertToArray($string){
        if(!empty($string) && $string !=null){
            return explode(',' , $string);
        }
        return [];
    }


    function sendEmail()
    {
        $smtp = getDefaultSMTPAccountDetails();
        $smtp = json_decode($smtp);
        $mail = new PHPMailer(true);                            // Passing `true` enables exceptions

        try {

            $mail->SMTPDebug = 0;                             // Enable verbose debug output
            $mail->isSMTP();                                        // Set mailer to use SMTP
            $mail->Host = $smtp->host_server;                                                // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                                // Enable SMTP authentication
            $mail->Username = $smtp->user_name;             // SMTP username
            $mail->Password = $smtp->password;              // SMTP password
            $mail->SMTPSecure = ($smtp->port == '587') ? 'tls' : $smtp->encryption_type;                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = $smtp->port;                                // TCP port to connect to
            //Recipients
            $mail->setFrom($smtp->from_email, 'Test Email');
            $mail->addAddress(env('DEFAULT_RECIVER_EMAIL' , 'atifmalik2009@gmail.com'));   // Add a recipient, Name is optional
            $mail->AddCC(env('DEFAULT_CC_EMAIL' , "atifmalik2009@gmail.com"));
            $mail->Subject = "EMAIL";
            $mail->isHTML(true);
            $mail->Body     ="BODY IS HERE";
            $mail->send();
            return true;
        } catch (Exception $e) {
           // dd($e->getMessage());
            return false;
        }
    }


    function getDefaultSMTPAccountDetails()
    {
        $smtp = [
            'host_server' => env('MAIL_HOST', ''),
            'user_name' => env('MAIL_USERNAME', ''),
            'password' => env('MAIL_PASSWORD', ''),
            'encryption_type' => env('MAIL_ENCRYPTION', 'tls'),
            'port' => env('MAIL_PORT', 587),
            'from_email' => env('MAIL_FROM_ADDRESS', 'atifmalik2009@gmail.com'),
        ];
        return json_encode($smtp);
    }