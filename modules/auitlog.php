<?php

function audit_log($SQL_Handle, $type, $description) {
    echo 'test';
    if($SQL_Statement = $SQL_Handle->prepare("INSERT INTO auditlog(auditlog_type, auditlog_description) VALUES(?, ?);")) {
        $SQL_Statement->bind_param('ss', $type, $description);
        $SQL_Statement->execute();
    } else {
        echo 'test' . $SQL_Handle->error;
    }
}