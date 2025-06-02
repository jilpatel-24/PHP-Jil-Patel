<?php
session_start();
if (!isset($_SESSION['students'])) $_SESSION['students'] = [];
if (!isset($_SESSION['marks'])) $_SESSION['marks'] = [];

$action = $_GET['action'] ?? 'menu';

function linkTo($label, $action) {
    echo "<li><a href='?action=$action'>$label</a></li>";
}

function backToMenu() {
    echo "<br><a href='?action=menu'>Back to Menu</a>";
}

function formInput($label, $name, $type = 'text') {
    echo "$label: <input type='$type' name='$name' required><br>";
}
?>
<h2>Student Management System</h2>

<?php
switch ($action) {
    case 'menu':
        echo "<ul>";
        linkTo("Add Student", "add");
        linkTo("View All Students", "view_all");
        linkTo("View Specific Student", "view_one");
        linkTo("Remove Student", "remove");
        linkTo("Add Student Marks", "add_marks");
        linkTo("View Student Marks", "view_marks");
        echo "</ul>";
        break;

    case 'add':
        echo "<h3>Add Student</h3>
        <form method='post' action='?action=add_submit'>";
        formInput("Name", "name");
        formInput("Contact", "contact");
        echo "<input type='submit' value='Add'></form>";
        backToMenu();
        break;

    case 'add_submit':
        $name = trim($_POST['name']);
        $contact = trim($_POST['contact']);

        if (!preg_match("/^[a-zA-Z]+$/", $name)) {
            echo " Invalid name.<br>";
        } elseif (!preg_match("/^\d{10}$/", $contact)) {
            echo " Invalid contact number.<br>";
        } else {
			if (!isset($_SESSION['student_id_counter'])) 
			{
			$_SESSION['student_id_counter'] = 1;
			}
			$id = $_SESSION['student_id_counter']++;
			$_SESSION['students'][$id] = ['name' => $name, 'contact' => $contact];

            echo " Student added with ID: <strong>$id</strong>";
        }
        backToMenu();
        break;

    case 'view_all':
        echo "<h3>All Students</h3>";
        if (empty($_SESSION['students'])) {
            echo "No students found.";
        } else {
            foreach ($_SESSION['students'] as $id => $s) {
                echo "ID: $id | Name: {$s['name']} | Contact: {$s['contact']}<br>";
            }
        }
        backToMenu();
        break;

    case 'view_one':
        echo "<h3>View Specific Student</h3>
        <form method='post' action='?action=view_one_result'>";
        formInput("Student ID", "id");
        echo "<input type='submit' value='Search'></form>";
        backToMenu();
        break;

    case 'view_one_result':
        $id = $_POST['id'];
        if (isset($_SESSION['students'][$id])) {
            $s = $_SESSION['students'][$id];
            echo " Found: ID: $id | Name: {$s['name']} | Contact: {$s['contact']}";
        } else {
            echo " Student not found.";
        }
        backToMenu();
        break;

    case 'remove':
        echo "<h3>Remove Student</h3>
        <form method='post' action='?action=remove_confirm'>";
        formInput("Student ID", "id");
        echo "<input type='submit' value='Check'></form>";
        backToMenu();
        break;

    case 'remove_confirm':
        $id = $_POST['id'];
        if (!isset($_SESSION['students'][$id])) {
            echo " Student not found.";
        } else {
            echo "Found: {$_SESSION['students'][$id]['name']}<br>
            <form method='post' action='?action=remove_done'>
                <input type='hidden' name='id' value='$id'>
                Confirm Deletion (Y/N): <input name='confirm' required><br>
                <input type='submit' value='Delete'>
            </form>";
        }
        backToMenu();
        break;

    case 'remove_done':
        if (strtoupper($_POST['confirm']) === 'Y') {
            unset($_SESSION['students'][$_POST['id']]);
            echo " Student deleted successfully.";
        } else {
            echo " Deletion cancelled.";
        }
        backToMenu();
        break;

    case 'add_marks':
        echo "<h3>Add Student Marks</h3>
        <form method='post' action='?action=add_marks_submit'>";
        formInput("Student ID", "id");
        formInput("Marks", "marks");
        echo "<input type='submit' value='Submit'></form>";
        backToMenu();
        break;

    case 'add_marks_submit':
        $id = $_POST['id'];
        $marks = $_POST['marks'];
        if (!isset($_SESSION['students'][$id])) {
            echo " Student ID not found.";
        } elseif (!is_numeric($marks)) {
            echo " Marks must be numeric.";
        } else {
            $_SESSION['marks'][$id] = $marks;
            echo " Marks added for student ID $id.";
        }
        backToMenu();
        break;

    case 'view_marks':
        echo "<h3>Student Marks</h3>";
        if (empty($_SESSION['marks'])) {
            echo "No marks found.";
        } else {
            foreach ($_SESSION['marks'] as $id => $m) {
                $n = $_SESSION['students'][$id]['name'] ?? 'Unknown';
                echo "ID: $id | Name: $n | Marks: $m<br>";
            }
        }
        backToMenu();
        break;

    default:
        echo "Invalid action.";
        backToMenu();
}
?>
