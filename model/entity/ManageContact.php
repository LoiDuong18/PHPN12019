<?php
class Learninghistory {
    var $id;
    var $Name;
    var $Phone;
    var $Email;
    var $idContact;
    function __construct($id, $Name, $Phone, $Email, $idContact)
    {
        $this->id =$id;
        $this->Name = $Name;
        $this->Phone =$Phone;
        $this->Email =$Email;
        $this->idContact =$idContact;
    }
    static function getList($idContact){
        //tao du lieu gia ( mook data)
        $rs =array();
        for ($i=0; $i<5; $i++){
            array_push($rs,new Learninghistory(
                $i,
                2001+$i,
                0123+$i,
                "NVA@gmail.com",
                "Hue",
                $idContact)
            );
        }
        return $rs;
    }
    static function getListFromFile($idContact){
        $lines = file("../resource/ManageContact.txt", FILE_IGNORE_NEW_LINES);
        $rs = array();
        foreach ($lines as $key =>$value){
            $arr = explode("$", $value);
            if ($arr[5] == $idContact)
                array_push($rs, new ManageContact(
                $arr[0],
                $arr[1],
                $arr[2],
                $arr[3],
                $arr[4],
                $arr[5]
                ));

        }
        return $rs;
   }
   
    static function getListFromDB ($idContact){
        // b1 : mo ket noi voi DB
        $con =new mysqli("localhost","root","","qldb");
        $con->set_charset("utf8");
        if ($con->connect_error)
            die("ket noi that bai". $con->connect_error);
        //b2: thao tac voi DB
        $query ="SELECT * FROM Contacts WHERE id='$idContact'";
        $result= $con->query($query);
        //var_dump($result);
        $rs = array();
        if ($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                array_push($rs,new ManageContact(
                    $row["id"],
                    $row["name"],
                    $row["phone"],
                    $row["email"]
                ));
            }
        }
        //tao database
        $sql = "CREATE DATABASE myDB";
        if ($con->query($sql) === TRUE) {
            echo "Co so du lieu duoc tao thanh cong";
        } else {
            echo "loi khi tao du lieu: " . $con->error;
        }
        //tao bang
        $sql = "INSERT INTO qldb (txtName, txtPhone, txtEmail)
        VALUES ('Nguyen Van A', '0123', 'NVA@gmail.com','Hue')";

        if ($con->query($sql) === TRUE) {
            echo "Them du lieu thanh cong";
        } else {
            echo "loi: " . $sql . "<br>" . $con->error;
        }
        //b3: Dong ket noi voi DB
        $con->close();
        return $rs;
    }
}
?>