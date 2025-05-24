<?php
session_start();
if (!isset($_SESSION['userdata'])) {
    header("location: ../");
    exit();
}
$userdata = $_SESSION['userdata'];
$photoPath = "../uploads/" . $userdata['photo'];
$groupsdata = $_SESSION['groupsdata'];

if ($userdata['status'] == 0) {
    $status = '<b style="color: red">Not voted</b>';
} else {
    $status = '<b style="color: green">Voted</b>';
}
?>

<html lang="en">
<head>
    <title>Online Voting System - Dashboard</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="icon" type="image/x-icon" href="logo.png">
</head>
<body>
    <style>
        #backbtn, #logoutbtn, #votebtn, #voted {
            padding: 5px;
            font-size: 15px;
            border-radius: 5px;
            color: white;
        }
        #backbtn, #logoutbtn {
            background-color: #3498db;
            margin: 15px;
        }
        #backbtn { float: left; }
        #logoutbtn { float: right; }

        #votebtn {
            background-color: #3498db;
        }
        #voted {
            background-color: green;
        }

        #Profile, #Group {
            background-color: white;
            padding: 20px;
        }

        #Profile {
            width: 30%;
            float: left;
        }

        #Group {
            width: 60%;
            float: right;
        }

        #mainpanel {
            padding: 10px;
        }
    </style>

    <div id="mainSection">
        <center>
            <div id="headerSection">
                <a href="../"><button id="backbtn">Back</button></a>
                <a href="logout.php"><button id="logoutbtn">Logout</button></a>
                <h1>Online Voting System</h1>
            </div>
        </center>
        <hr>

        <div id="mainpanel">
            <div id="Profile">
                <center>
                    <img src="<?php echo htmlspecialchars($photoPath); ?>" height="100" width="100" alt="User Photo">
                </center><br><br>
                <b>Name:</b> <?php echo htmlspecialchars($userdata['name']); ?><br><br>
                <b>Mobile:</b> <?php echo htmlspecialchars($userdata['mobile']); ?><br><br>
                <b>Address:</b> <?php echo htmlspecialchars($userdata['address']); ?><br><br>
                <b>Status:</b> <?php echo $status; ?>
            </div>

            <div id="Group">
                <?php
                if (!empty($groupsdata)) {
                    foreach ($groupsdata as $group) {
                        $groupPhoto = htmlspecialchars($group['photo']);
                        $groupName = htmlspecialchars($group['name']);
                        $groupVotes = (int)$group['votes'];
                        $groupId = (int)$group['id'];
                        ?>
                        <div>
                            <img style="float: right" src="../uploads/<?php echo $groupPhoto; ?>" height="100" width="100" alt="Group Photo">
                            <b>Group Name:</b> <?php echo $groupName; ?> <br><br>
                            <b>Votes:</b> <?php echo $groupVotes; ?> <br><br>
                            <form action="../api/vote.php" method="POST">
                                <input type="hidden" name="gvotes" value="<?php echo $groupVotes; ?>">
                                <input type="hidden" name="gid" value="<?php echo $groupId; ?>">
                                <?php if ($userdata['status'] == 0): ?>
                                    <input type="submit" name="votebtn" value="Vote" id="votebtn">
                                <?php else: ?>
                                    <button disabled type="button" id="voted">Voted</button>
                                <?php endif; ?>
                            </form>
                        </div>
                        <hr>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>