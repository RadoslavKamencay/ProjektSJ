<?php

if (!isset($_POST['action'])) {
    exit();
}

include_once "classes/user.php";

function checkId($id) {

    if (!is_numeric($id))
        return 'ID musí byť číslo!';

    return null;
}

function checkName($name) {

    if (strlen($name) < 6)
        return 'Meno musí byť dlhšie ako 6 znakov!';

    if (strlen($name) > 40)
        return 'Meno musí byť kratšie ako 40 znakov!';

    if (preg_match('@[^\w\s]@', $name))
        return 'Meno nesmie obsahovať symbol!';

    return null;
}


function checkEmail($email) {

    if (!str_contains($email, "@gmail.com"))
        return 'Email musí obsahovať @gmail.com!';

    if (str_contains($email, " "))
        return 'Email nesmie obsahovať medzeru!';
    
    return null;
}

function checkPass($pass, $confirmPass, $form = 0) {

    // form = 0 - register
    // form = 1 - create user by admin
    // form = 2 - edit user by admin

    if ($form == 2 && !$pass)
        return null;

    if (strlen($pass) < 8)
        return 'Heslo musí byť dlhšie ako 8 znakov!';

    if (strlen($pass) > 100)
        return 'Heslo musí byť kratšie ako 100 znakov!';

    if (!preg_match('@[A-Z]@', $pass))
        return 'Heslo musí obsahovať aspoň jedno velké písmeno!';

    if (!preg_match('@[a-z]@', $pass))
        return 'Heslo musí obsahovať aspoň jedno malé písmeno!';

    if (!preg_match('@[0-9]@', $pass))
        return 'Heslo musí obsahovať aspoň jedno číslo!';

    if (!preg_match('@[^\w]@', $pass))
        return 'Heslo musí obsahovať aspoň jeden symbol!';

    if ($form == 0 && $pass != $confirmPass)
        return 'Heslo a potvrdenie hesla sa nezhodujú!';

    return null;
}

$idCheck = checkId($_POST['id']);
$nameCheck = checkName($_POST['name']);
$emailCheck = checkEmail($_POST['email']);

switch ($_POST['action']) {
    case 'register': {

        $passCheck = checkPass($_POST['pass'], $_POST['confirm_pass'], 0);

        if ($nameCheck !== null) {
            header('location: registracia.php?error='.$nameCheck);
            exit();
        }
        if ($emailCheck !== null) {
            header('location: registracia.php?error='.$emailCheck);
            exit();
        }
        if ($passCheck !== null) {
            header('location: registracia.php?error='.$passCheck);
            exit();
        }

        $user = new User();
        $user->create($_POST['email'], $_POST['pass'], $_POST['name'], false, true);
        break;
    }
    case 'login': {

        if ($emailCheck !== null) {
            header('location: registracia.php?error='.$emailCheck);
            exit();
        }

        $user = new User();
        $user->login($_POST['email'], $_POST['pass']);
        break;
    }
    case 'logout': {
        $user = new User();
        $user->logout();
        break;
    }
    case 'create': {

        $passCheck = checkPass($_POST['pass'], $_POST['confirm_pass'], 1);

        if ($nameCheck !== null) {
            header('location: createuser.php?error='.$nameCheck);
            exit();
        }
        if ($emailCheck !== null) {
            header('location: createuser.php?error='.$emailCheck);
            exit();
        }
        if ($passCheck !== null) {
            header('location: createuser.php?error='.$passCheck);
            exit();
        }

        $user = new User();
        $user->create($_POST['email'], $_POST['pass'], $_POST['name'], ($_POST['admin'] == 'on'), false);
        break;
    }
    case 'update': {

        $passCheck = checkPass($_POST['pass'], $_POST['confirm_pass'], 2);

        if ($idCheck !== null) {
            header('location: edituser.php?error='.$idCheck.'&id='.$_POST['id']);
            exit();
        }
        if ($nameCheck !== null) {
            header('location: edituser.php?error='.$nameCheck.'&id='.$_POST['id']);
            exit();
        }
        if ($emailCheck !== null) {
            header('location: edituser.php?error='.$emailCheck.'&id='.$_POST['id']);
            exit();
        }
        if ($passCheck !== null) {
            header('location: edituser.php?error='.$passCheck.'&id='.$_POST['id']);
            exit();
        }

        $user = new User();
        $user->update($_POST['id'], $_POST['email'], $_POST['pass'], $_POST['name'], ($_POST['admin'] == 'on'));
        break;
    }
    case 'delete': {

        if ($idCheck !== null) {
            header('location: users.php?error='.$idCheck);
            exit();
        }

        $user = new User();
        $user->delete($_POST['id']);
        break;
    }
    default: {
        die('Neznama akcia');
    }
}