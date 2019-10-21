<?php
class Learninghistory {
    var $id;
    var $yearFrom;
    var $yearTo;
    var $schoolName;
    var $schoolAddress;
    var $idStudent;
    function __construct($id, $yearFrom, $yearTo, $schoolName, $schoolAddress, $idStudent)
    {
        $this->id =$id;
        $this->yearFrom = $yearFrom;
        $this->yearTo =$yearTo;
        $this->schoolName =$schoolName;
        $this->schoolAddress =$schoolAddress;
        $this->idStudent =$idStudent;
    }
    static function getList($idStudent){
        //tao du lieu gia ( mook data)
        $rs =array();
        for ($i=0; $i<5; $i++){
            array_push($rs,new Learninghistory(
                $i,
                2001+$i,
                2002+$i,
                "PDL",
                "Hue",
                $idStudent)
            );
        }
        return $rs;
    }
    static function getListFromFile($idStudent){
        $lines = file("../resource/learninghistory.txt", FILE_IGNORE_NEW_LINES);
        $rs = array();
        foreach ($lines as $key =>$value){
            $arr = explode("$", $value);
            if ($arr[5] == $idStudent)
                array_push($rs, new Learninghistory(
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
   
    static function getListFromDB ($idStudent){
        // b1 : mo ket noi voi DB
        $con =new mysqli("localhost","root","","qlsv");
        $con->set_charset("utf8");
        if ($con->connect_error)
            die("ket noi that bai". $con->connect_error);
        //b2: thao tac voi DB
        $query ="SELECT * FROM quatrinhhoctap WHERE masinhvien='$idStudent'";
        $result= $con->query($query);
        //var_dump($result);
        $rs = array();
        if ($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                array_push($rs,new Learninghistory(
                    $row["ma"],
                    $row["tunam"],
                    $row["dennam"],
                    $row["tentruong"],
                    $row["diachitruong"],
                    $row["masinhvien"]
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
        $sql = "INSERT INTO qlsv (txttunam, txtdennam, txttruong, txtnoihoc)
        VALUES ('2001', '2002', 'Le Loi','Hue')";

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