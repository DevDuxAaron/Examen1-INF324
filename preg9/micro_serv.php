<?php
include "conexion.php";
$conn=new conexion();

//GET
if($_SERVER['REQUEST_METHOD']=='GET'){
    
        $query="select * from persona";
        $sql=$conn->prepare($query);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200");
        echo json_encode($sql->fetchAll());
        exit;
    
}    

//GET:id
if($_SERVER['REQUEST_METHOD']=='GET'){
    
    $query="select * from persona where id=:id";
    $sql=$conn->prepare($query);
    $sql->bindValue(':id',$_POST['id']);
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200");
    echo json_encode($sql->fetchAll());
    exit;

}

//POST(Alta)
if($_SERVER['REQUEST_METHOD']=='POST'){
        $query="insert into persona(ci,nombre, fecha_nac,departamento) VALUES (:ci,:nombre, :fecha_nac,:departamento); ";
        $sql=$conn->prepare($query);
        $sql->bindValue(':ci',$_POST['ci']);
        $sql->bindValue(':nombre',$_POST['nombre']);
        $sql->bindValue(':fecha_nac',$_POST['fecha_nac']);
        $sql->bindValue(':departamento',$_POST['departamento']);

        $sql->execute();
        $id=$conn->lastInsertId();
        if($id){
            header("HTTP/1.1 200");
            echo json_encode($id);
            echo "resgistro existente";
            exit;
        }
}

//PUT(Cambio)
if($_SERVER['REQUEST_METHOD']=='PUT'){
    $query="update persona set nombre=:nombre, fecha_nac=:fecha_nac, departamento=:departamento. ci =:ci where id =:id";
    
    $sql=$conn->prepare($query);
    $sql->bindValue(':nombre_completo',$_GET['nombre_completo']);
    $sql->bindValue(':fecha_nacimiento',$_GET['fecha_nacimiento']);
    $sql->bindValue(':departamento',$_GET['departamento']);
    $sql->bindValue(':ci',$_GET['ci']);
    $sql->execute();
    header("HTTP/1.1 200");
    echo "registro actualizado";
}

//DELETE(Baja)
if($_SERVER['REQUEST_METHOD']=='DELETE'){
    $query="delete from persona where id=:id ;";
    $sql=$conn->prepare($query);
    $sql->bindValue(':id',$_GET['id']);
    $sql->execute();
    header("HTTP/1.1 200");
    echo "resgistro eliminado exitosamente";
    exit;
}
header("HTTP/1.1 400")

?>