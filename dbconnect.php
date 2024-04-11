<?php

class DataBase
{
  public $db;
  function __construct($db)
  {
    try {
      $pdo = new PDO("mysql:host=localhost;dbname=original", "root", "");

    } catch (PDOException $e) {
      echo $e->getMessage();
      die();
    }
    $this->db = $pdo;
  }

  // create user 
  public function create_user($name, $email, $password)
  {
    $query = "INSERT INTO users (name,email,password) VALUES(?,?,?);";
    $statement = $this->db->prepare($query);
    $statement->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT)]);
    return $this->db->lastInsertId();
  }

  // get all users from database
  public function get_all_Users()
  {
    $statement = $this->db->prepare("select * from users");
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_OBJ);
    return $users;
  }

  // get one user by id
  public function get_User($id)
  {
    $statement = $this->db->prepare("select * from users where id=$id");
    $statement->execute();
    $user = $statement->fetchAll(PDO::FETCH_OBJ);
    return $user;
  }

  public function current_user_billings()
  {
    $statement = $this->db->prepare("select * from billing where user_id = " . $_SESSION['current_user']->id);
    $statement->execute();
    $billings = $statement->fetchAll(PDO::FETCH_OBJ);
    return $billings;
  }

  public function billings()
  {
    $statement = $this->db->prepare("select * from billing ");
    $statement->execute();
    $billings = $statement->fetchAll(PDO::FETCH_OBJ);
    return $billings;
  }

  public function add_billin($user_id, $board_id, $start_date, $end_date, $due_date, $bil_amount, $kw)
  {
    $query = "INSERT INTO billing (user_id,board_id,start_date,end_date,due_date,paid,bill_amount,kw) VALUES(?,?,?,?,?,?,?,?);";
    $statement = $this->db->prepare($query);
    $statement->execute([$user_id, $board_id, $start_date, $end_date, $due_date, 0, $bil_amount, $kw]);
  }

  public function get_all_admins()
  {
    $statement = $this->db->prepare("select * from admin");
    $statement->execute();
    $admins = $statement->fetchAll(PDO::FETCH_OBJ);
    return $admins;
  }

  public function get_all_feedbacks()
  {
    $statement = $this->db->prepare("select * from feedback");
    $statement->execute();
    $feedback = $statement->fetchAll(PDO::FETCH_OBJ);
    return $feedback;
  }

  public function solve_feedback($id)
  {
    $statement = $this->db->prepare("UPDATE feedback SET solve=1 WHERE id=$id");
    $statement->execute();
  }

  public function delete_billing($id)
  {
    $statement = $this->db->prepare("DELETE FROM billing WHERE id=$id");
    $statement->execute();
  }

  public function update_user($user_id, $email, $name)
  {
    $sql = "UPDATE users SET name=?, email=? WHERE id=?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$name, $email, $user_id]);
  }
  public function create_board($user_id, $board_id, $type)
  {
    $query = "INSERT INTO electricity_board (user_id,board_id,type) VALUES(?,?,?);";
    $statement = $this->db->prepare($query);
    $statement->execute([$user_id, $board_id, $type]);
  }
  public function board_by_user($userId)
  {
    $statement = $this->db->prepare("select * from electricity_board where user_id = $userId");
    $statement->execute();
    $boards = $statement->fetchAll(PDO::FETCH_OBJ);
    return $boards;
  }
  public function board_by_BoardId($board)
  {
    $statement = $this->db->prepare("select * from electricity_board where board_id = $board");
    $statement->execute();
    $board = $statement->fetchAll(PDO::FETCH_OBJ);
    return $board;
  }
  public function create_billingInfo($billing_id, $user_id, $credit, $billing_address, $noc, $exp, $passcode)
  {
    $query = "INSERT INTO billing_info (billing_id,user_id,credit_card,billing_address,noc,exp,passcode) VALUES(?,?,?,?,?,?,?);";
    $statement = $this->db->prepare($query);
    $statement->execute([$billing_id, $user_id, $credit, $billing_address, $noc, $exp, $passcode]);
  }
  public function updatePaid($id)
  {
    $sql = "UPDATE billing SET paid=1 WHERE id=$id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
  }

  public function getResdentailPrice()
  {
    $statement = $this->db->prepare("select * from residentail_price ");
    $statement->execute();
    $billings = $statement->fetchAll(PDO::FETCH_OBJ);
    return $billings;
  }

  public function getNonResdentailPrice()
  {
    $statement = $this->db->prepare("select * from non_residentail_price ");
    $statement->execute();
    $billings = $statement->fetchAll(PDO::FETCH_OBJ);
    return $billings;
  }
  public function updatePassword($id, $password)
  {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET password=? WHERE id=?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$password, $id]);
  }

  public function getBoardType($boardId)
  {
    $statement = $this->db->prepare("select * from electricity_board where board_id= $boardId ");
    $statement->execute();
    $board = $statement->fetchAll(PDO::FETCH_OBJ);
    return $board[0];
  }

  public function getBillingInfoId($billingId)
  {
    $statement = $this->db->prepare("select * from billing_info where billing_id= $billingId ");
    $statement->execute();
    $board = $statement->fetchAll(PDO::FETCH_OBJ);
    return $board[0];
  }

  public function getBillingInfo()
  {
    $statement = $this->db->prepare("select * from billing_info ");
    $statement->execute();
    $billingInfo = $statement->fetchAll(PDO::FETCH_OBJ);
    return $billingInfo;
  }
  public function getBilling($id)
  {
    $statement = $this->db->prepare("select * from billing where id=$id ");
    $statement->execute();
    $billing = $statement->fetchAll(PDO::FETCH_OBJ);
    return $billing;
  }
  public function deleteBillingInfoByBillingID($id)
  {
    $statement = $this->db->prepare("DELETE from billing_info where billing_id=$id ");
    $statement->execute();
  }
  public function createContact($name, $email, $messssage)
  {
    $query = "INSERT INTO contact (name,email,message) VALUES(?,?,?);";
    $statement = $this->db->prepare($query);
    return $statement->execute([$name, $email, $messssage]);
  }
  public function getContact()
  {
    $statement = $this->db->prepare("select * from contact");
    $statement->execute();
    $contacts = $statement->fetchAll(PDO::FETCH_OBJ);
    return $contacts;
  }

  public function getUserLimit($limit,$offset)
  {
    $statement = $this->db->prepare("SELECT * from users LIMIT $limit OFFSET $offset");
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_OBJ);
    return $users;
  }
}