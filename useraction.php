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

    if (preg_match('@[^\w]@', $name))
        return 'Meno nesmie obsahovať symbol!';
    
    if (str_contains($name, " "))
        return 'Meno nesmie obsahovať medzeru!';

    return null;
}


function checkEmail($email) {

    if (!str_contains($email, "@gmail.com"))
        return 'Email musí obsahovať @gmail.com!';

    if (str_contains($email, " "))
        return 'Email nesmie obsahovať medzeru!';
    
    return null;
}

function checkPass($pass, $confirmPass) {

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

    if ($pass != $confirmPass)
        return 'Heslo a potvrdenie hesla sa nezhodujú!';

    return null;
}

$idCheck = checkId($_POST['id']);
$nameCheck = checkName($_POST['name']);
$emailCheck = checkEmail($_POST['email']);
$passCheck = checkPass($_POST['pass'], $_POST['confirm_pass']);

switch ($_POST['action']) {
    case 'register': {

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

        if ($nameCheck !== null) {
            header('location: create.php?error='.$nameCheck);
            exit();
        }
        if ($emailCheck !== null) {
            header('location: create.php?error='.$emailCheck);
            exit();
        }
        if ($passCheck !== null) {
            header('location: create.php?error='.$passCheck);
            exit();
        }

        $user = new User();
        $user->create($_POST['email'], $_POST['pass'], $_POST['name'], ($_POST['admin'] == '1'), false);
        break;
    }
    case 'update': {

        if ($idCheck !== null) {
            header('location: create.php?error='.$idCheck);
            exit();
        }
        if ($nameCheck !== null) {
            header('location: create.php?error='.$nameCheck);
            exit();
        }
        if ($emailCheck !== null) {
            header('location: create.php?error='.$emailCheck);
            exit();
        }
        if ($passCheck !== null) {
            header('location: create.php?error='.$passCheck);
            exit();
        }

        $user = new User();
        $user->update($_POST['id'], $_POST['email'], $_POST['pass'], $_POST['name'], ($_POST['admin'] == '1'));
        break;
    }
    case 'edit': {

        if ($idCheck !== null) {
            header('location: users.php?error='.$idCheck);
            exit();
        }

        header('location: edit.php?id='.$_POST['id']);
        exit();
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
}