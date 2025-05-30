<?php
session_start();
if (!isset($_SESSION['userdata'])) {
    header("location: ../");
    exit();
}
$userdata = $_SESSION['userdata'];
$photoPath = "../uploads/" . $userdata['photo'];
$groupsdata = $_SESSION['groupsdata'];

$status = ($userdata['status'] == 0) ? '<b style="color: red">Not voted</b>' : '<b style="color: green">Voted</b>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Voting System - Dashboard</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="icon" type="image/x-icon" href="logo.png">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #a1c4fd, #c2e9fb);
        }

        #backbtn, #logoutbtn, #votebtn, #voted {
            padding: 8px 16px;
            font-size: 15px;
            border-radius: 6px;
            color: white;
            border: none;
        }

        #backbtn, #logoutbtn {
            background-color: #3498db;
            margin: 15px;
            cursor: pointer;
        }

        #backbtn:hover, #logoutbtn:hover, #votebtn:hover {
            background-color: #2c80b4;
        }

        #backbtn { float: left; }
        #logoutbtn { float: right; }

        #votebtn {
            background-color: #3498db;
        }

        #voted {
            background-color: green;
        }

        #Profile {
            background-color: white;
            width: 30%;
            float: left;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            text-align: center;
        }

        #Profile img {
            border-radius: 50%;
            border: 2px solid #3498db;
        }

        #Group {
            width: 65%;
            float: right;
        }

        .group-box {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: transform 0.2s ease;
        }

        .group-box:hover {
            transform: scale(1.02);
        }

        .group-box img {
            height: 100px;
            width: 100px;
            border-radius: 10px;
            margin-left: 20px;
        }

        .group-info {
            flex-grow: 1;
        }

        .progress-bar-container {
            background-color: #ddd;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 5px;
        }

        .progress-bar {
            height: 20px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            line-height: 20px;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            #Profile, #Group {
                width: 100%;
                float: none;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

<div id="mainSection">
    <center>
        <div id="headerSection">
            <a href="../"><button id="backbtn"><i class="fas fa-arrow-left"></i> Back</button></a>
            <a href="logout.php"><button id="logoutbtn"><i class="fas fa-sign-out-alt"></i> Logout</button></a>
            <h1>Online Voting System</h1>
        </div>
    </center>
    <hr>

    <div id="mainpanel">
        <div id="Profile">
            <img src="<?php echo htmlspecialchars($photoPath); ?>" height="100" width="100" alt="User Photo"><br><br>
            <b>Name:</b> <?php echo htmlspecialchars($userdata['name']); ?><br><br>
            <b>Mobile:</b> <?php echo htmlspecialchars($userdata['mobile']); ?><br><br>
            <b>Address:</b> <?php echo htmlspecialchars($userdata['address']); ?><br><br>
            <b>Status:</b> <?php echo $status; ?>
        </div>

        <div id="Group">
            <?php if (!empty($groupsdata)) {
                foreach ($groupsdata as $group) {
                    $groupPhoto = htmlspecialchars($group['photo']);
                    $groupName = htmlspecialchars($group['name']);
                    $groupVotes = (int)$group['votes'];
                    $groupId = (int)$group['id'];
                    $votePercentage = $groupVotes > 0 ? min(100, $groupVotes) : 1; // You can compute real %
                    ?>
                    <div class="group-box">
                        <div class="group-info">
                            <b>Group Name:</b> <?php echo $groupName; ?><br><br>
                            <b>Votes:</b> <?php echo $groupVotes; ?>

                            <div class="progress-bar-container">
                                <div class="progress-bar" style="width: <?php echo $votePercentage; ?>%;">
                                    <?php echo $groupVotes; ?> Votes
                                </div>
                            </div><br>

                            <?php if ($userdata['role'] == '1') { ?>
                                <form action="../api/vote.php" method="POST">
                                    <input type="hidden" name="gvotes" value="<?php echo $groupVotes; ?>">
                                    <input type="hidden" name="gid" value="<?php echo $groupId; ?>">
                                    <?php if ($userdata['status'] == 0): ?>
                                        <input type="submit" name="votebtn" value="Vote" id="votebtn">
                                    <?php else: ?>
                                        <button disabled type="button" id="voted">Voted</button>
                                    <?php endif; ?>
                                </form>
                            <?php } ?>
                        </div>
                        <img src="../uploads/<?php echo $groupPhoto; ?>" alt="Group Photo">
                    </div>
                <?php }
            } ?>
        </div>
    </div>
</div>

</body>
</html>
