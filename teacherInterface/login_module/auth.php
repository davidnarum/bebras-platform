<?php

function loadSchoolUsers($db) {
  $query = "SELECT DISTINCT `user`.`firstName`, `user`.`lastName` FROM `user_user` ".
     " INNER JOIN `user` ON `user`.`ID` = `user_user`.`userID`".
     " WHERE `user_user`.`targetUserID` = :userID";
  $stmt = $db->prepare($query);
  $stmt->execute(array("userID" => $_SESSION["userID"]));
  $users = array();
  while ($row = $stmt->fetchObject()) {
     $users[] = $row;
  }
  return $users;
}


function jsonUser($db, $row, $options) {
   return array_merge($options, [
      "user" => array(
         "ID" => $row->ID,
         "isAdmin" => $row->isAdmin,
         "allowMultipleSchools" => $row->allowMultipleSchools,
         "gender" => $row->gender,
         "firstName" => $row->firstName,
         "lastName" => $row->lastName,
         "officialEmail" => $row->officialEmail,
         "alternativeEmail" => $row->alternativeEmail,
         "officialEmailValidated" => $row->officialEmailValidated,
         "alternativeEmailValidated" => $row->alternativeEmailValidated,
         "awardPrintingDate" => $row->awardPrintingDate,
         ),
      "alternativeEmailValidated" => $row->alternativeEmailValidated,
      "schoolUsers" => loadSchoolUsers($db)
   ]);
}


function setUserSession($row) {
    $_SESSION["userID"] = $row->ID;
    $_SESSION["isAdmin"] = $row->isAdmin;
    if($row->isAdmin) {
        $_SESSION["userType"] = "admin";
    } else {
        $_SESSION["userType"] = "user";
    }
}


function createUpdateUser($db, $user) {
    $row = makeUserObject($user);
    $query = "SELECT * FROM `user` WHERE `ID` = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$row->ID]);
    if($stmt->fetchObject()) {
        updateUser($db, $row);
    } else {
        $row->ID = createUser($db, $row);
    }
    return $row;
}


function makeUserObject($user) {
    $res = [
        'ID' => $user['id'],
        'firstName' => $user['first_name'],
        'lastName' => $user['last_name'],
        'isOwnOfficialEmail' => 1,
        'officialEmail' => $user['primary_email'],
        'officialEmailValidated' => empty($user['primary_email_verified']) ? 0 : 1,
        'alternativeEmail' => $user['secondary_email'],
        'alternativeEmailValidated' => empty($user['secondary_email_verified']) ? 0 : 1,
        'comment' => $user['presentation'],
        'gender' => null,
        'isAdmin' => false
    ];
    if($user['gender'] == 'm') {
        $res['gender'] = 'M';
    } else if($user['gender'] == 'f') {
        $res['gender'] = 'F';
    }
    return (object) $res;
}



function createUser($db, $row) {
    $stmt = $db->prepare("
        INSERT INTO
            `user`
            (`ID`, `lastLoginDate`, `firstName`, `lastName`, `officialEmail`, `officialEmailValidated`, `alternativeEmail`, `alternativeEmailValidated`, `comment`, `gender`)
        VALUES
            (:ID, UTC_TIMESTAMP(), :firstName, :lastName, :officialEmail, :officialEmailValidated, :alternativeEmail, :alternativeEmailValidated, :comment, :gender)
    ");
    $stmt->execute([
        'ID' => $row->ID,
        'firstName' => $row->firstName,
        'lastName' => $row->lastName,
        'officialEmail' => $row->officialEmail,
        'officialEmailValidated' => $row->officialEmailValidated,
        'alternativeEmail' => $row->alternativeEmail,
        'alternativeEmailValidated' => $row->alternativeEmailValidated,
        'comment' => $row->comment,
        'gender' => $row->gender
    ]);
    return $db->lastInsertId();
}


function updateUser($db, $row) {
    $stmt = $db->prepare("
        UPDATE
            `user`
        SET
            `lastLoginDate` = UTC_TIMESTAMP(),
            `firstName` = :firstName,
            `lastName` = :lastName,
            `officialEmail` = :officialEmail,
            `officialEmailValidated` = :officialEmailValidated,
            `alternativeEmail` = :alternativeEmail,
            `alternativeEmailValidated` = :alternativeEmailValidated,
            `comment` = :comment,
            `gender` = :gender
        WHERE
            `ID` = :ID
    ");
    $stmt->execute([
        'ID' => $row->ID,
        'firstName' => $row->firstName,
        'lastName' => $row->lastName,
        'officialEmail' => $row->officialEmail,
        'officialEmailValidated' => $row->officialEmailValidated,
        'alternativeEmail' => $row->alternativeEmail,
        'alternativeEmailValidated' => $row->alternativeEmailValidated,
        'comment' => $row->comment,
        'gender' => $row->gender
   ]);
}