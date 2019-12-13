<?php
function ShowMessages()
{

    if ( !$_SESSION["head_printed"] ) BasicHead();
    if ( ! isset($_SESSION['user']) AND ! $login_form AND ! $register_form AND ! $no_access)
    {
        HomePage();
    }else{
        HomePage2();
    }
    //weergeven messages
    if ( count($_SESSION["msg"]) > 0 )
    {

        foreach( $_SESSION["msg"] as $message )
        {
            $row = array( "message" => $message );
            $data = array( $row ) ;
            $templ = LoadTemplate("messages");
            print ReplaceContent( $data, $templ );
        }

        unset($_SESSION['msg']);
    }
}