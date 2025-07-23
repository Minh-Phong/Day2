
<?php

class Customer {
    public $id;
    public $username;
    public $password;
    public $fullname;
    public $address;
    public $phone;
    public $gender;
    public $birthday;

    public function __construct($id, $username, $password, $fullname, $address, $phone, $gender, $birthday) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->fullname = $fullname;
        $this->address = $address;
        $this->phone = $phone;
        $this->gender = $gender;
        $this->birthday = $birthday;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newCustomer = new Customer(
        $_POST['id'],
        $_POST['username'],
        $_POST['password'],
        $_POST['fullname'],
        $_POST['address'],
        $_POST['phone'],
        $_POST['gender'],
        $_POST['birthday']
    );

    if (!isset($_SESSION['customers'])) {
        $_SESSION['customers'] = [];
    }

    $_SESSION['customers'][] = $newCustomer;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Customer Management</title>
</head>
<body>
    <h2>Add New Customer</h2>
    <form method="post">
        <label>ID:</label><br>
        <input type="text" name="id" required><br>

        <label>Username:</label><br>
        <input type="text" name="username" required><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br>

        <label>Full Name:</label><br>
        <input type="text" name="fullname" required><br>

        <label>Address:</label><br>
        <input type="text" name="address"><br>

        <label>Phone:</label><br>
        <input type="text" name="phone"><br>

        <label>Gender:</label><br>
        <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br>

        <label>Birthday:</label><br>
        <input type="date" name="birthday"><br><br>

        <input type="submit" value="Add Customer">
    </form>
    <h2>Customer List</h2>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Full Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Birthday</th>
        </tr>

        <?php
        if (isset($_SESSION['customers'])) {
            foreach ($_SESSION['customers'] as $customer) {
                echo "<tr>";
                echo "<td>{$customer->id}</td>";
                echo "<td>{$customer->username}</td>";
                echo "<td>{$customer->password}</td>";
                echo "<td>{$customer->fullname}</td>";
                echo "<td>{$customer->address}</td>";
                echo "<td>{$customer->phone}</td>";
                echo "<td>{$customer->gender}</td>";
                echo "<td>{$customer->birthday}</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>
