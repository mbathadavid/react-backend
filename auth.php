<?
require_once 'config.php';
Class Auth extends Database {
    public function signup($fname,$sname,$email,$pass) {
        $sql = "INSERT INTO accounts(Fname,Sname,Email,Pass) VALUES (:fname,:sname,:email,:pass)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['fname'=>$fname,'sname'=>$sname,'email'=>$email,'pass'=>$pass]);
        return true;
    }
    public function login($username,$psw){
        $sql = "SELECT * FROM accounts WHERE Email = :username AND Pass = :psw";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username'=>$username,'psw'=>$psw]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}


?>