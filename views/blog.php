<?php 
    require("../adminpanel/php/connect.php");
    if(isset($_GET['blog_id'])){
        $blog_id = $_GET['blog_id'];
        $sql = "SELECT * FROM blog WHERE blog_id = $blog_id";
        $res = $conn->query($sql);
        if($res->num_rows >0){
            $row = $res->fetch_assoc();
            $sql = "SELECT * FROM comment WHERE blog_id = $row[blog_id] AND is_approve=1";
            $res = $conn->query($sql);
            $arr = array();
            if($res->num_rows > 0){
                while($row1 = $res->fetch_assoc()){
                    array_push($arr,$row1);
                }
            }  
        }else{
            $error = array("status"=>"false","message"=>"No Blog Found.");
        }
    }else{
        $error = array("status"=>"false","message"=>"No Blog Found.");   
    }
?>
<html>
<head>
    <?php require("../components/head.php");?>
    <title>Quicken Assist Support Number|Blogs</title>
    <meta name="description"
        content="<?= $row['short_desc']?>" />

    <meta name="keywords"
        content="<?=$row['keywords']?>" />
    <style>
        .comment_top{
            display:flex;
            flex-wrap:wrap;
        }
        .comment_top span{
            margin-right:2rem;
            color:#555;
            display:flex;
            align-items:center;
            font-size:14px;
        }
        .blog{
            /* overflow:hidden; */
        }
        .blog h1,.blog h2,.blog h3{
            font-size:1.8rem;
            margin:0;
        }
        .blog ul:not(.browser-default)>li {
            list-style-type: square;
        }
        .blog ul:not(.browser-default) {
            padding-left: 2rem;
            list-style-type: none;
        }
        .blog a{
            color:#c62828!important;
        }
        .blog figure{
            margin:0!important;
        }
        .blog figure.image img{
            width:100%!important;
        }
        .auther{
            display:flex;
            align-items:center;
        }
        .auther .material-icons{
            font-size:45px;
        }
    </style>
</head>
<body><?php require("../components/nav.php");?>
    <div class="my-overflow" style="background-color:#fafafa;">
        <section class="my-container ">
            <?php 
                if(empty($error)){?>
                    <h3 class="m-0 main-heading mb-1 mt-2"><?=$row['title'] ?></h3>
                    <div class="comment_top mb-1">
                        <span> <i class="material-icons">event_note</i>&nbsp;<?=date("d.m.Y", strtotime($row['date']));?></span>
                        <span> <i class="material-icons">person</i>&nbsp;Mark Selevestor</span>
                        <span> <i class="material-icons">comment</i>&nbsp;<?=count($arr)?>&nbsp;Comments</span>
                    </div>
                    <div class="blog">
                        <?=$row['desc']?>
                    </div>
                    <div class="comment-box">
                        <div class="card-panel" style="padding:10px 16px"><?=count($arr)?>&nbsp;Comments</div>
                        <div>
                            <div class="progress hide" id="progress" style="margin-bottom:-10px;">
                                <div class="indeterminate"></div>
                            </div>
                            <div class="card-panel">
                                <form class="col s12" method="post">
                                    <div class="row">
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input id="first_name" name="first_name" type="text" class="validate" required>
                                            <label for="first_name">First Name</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">drafts</i>
                                            <input id="email" type="email" required name="email" class="validate">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">create</i>
                                            <textarea id="textarea1" name="comment" class="materialize-textarea" required></textarea>
                                            <label for="textarea1">Textarea</label>
                                        </div>
                                    </div>
                                    <button class="btn waves-effect waves-light primary" type="button" id="submit" >Comment
                                        <i class="material-icons right">comment</i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <?php 
                            if(!empty($arr)){
                               foreach($arr as $key=>$value){?>
                                   <div class="card-panel">
                                       <div class="auther">
                                           <span class="pl-10"><i class="material-icons">account_circle</i></span>
                                           <span>
                                               <span><?=$value['name']?></span><br/>
                                               <span><?=date('d.m.y',strtotime($value['date']))?></span>
                                           </span>
                                       </div>
                                       <div >
                                           <p><?= $value['comment']?></p>
                                       </div>
                                   </div>
                            <?php            
                                }
                            }else{ ?>
                            <div class="card-panel">No Comments.</div>
                        <?php
                            }
                        ?>
                    </div>
            <?php
                }else{?>
                <div class="card-panel"><?=$error['message']?></div>
            <?php
                }
            ?>
        </section>
        <?php require("../components/footer.php");?>
        <script>
                $(document).ready(()=>{
                    $("#submit").click(()=>{
                        $('#progress').removeClass("hide");
                        let name = $("#first_name").val();
                        let email = $("#email") .val();
                        let comment = $('#textarea1').val();
                        let blog_id = <?=$_GET['blog_id'] ?>;
                        if(name == "" || email =="" || comment == "" ){
                            $('#progress').addClass("hide");
                            M.toast({html: 'Please fill all entries!'});
                        }else{
                            $.ajax({
                                type:"post",
                                data:{name,email,comment,blog_id},
                                url:"../api/comment.php",
                                success:(data)=>{
                                    let mydata = JSON.parse(data);
                                    M.toast({html: mydata.message});
                                    $('#progress').addClass("hide");
                                    setTimeout(()=>{
                                        window.location.reload();
                                    },3000);
                                },
                                error:(err)=>{
                                    M.toast({html: 'Oops! Error found.'});
                                    $('#progress').addClass("hide");
                                    console.log(err);
                                }
                            })
                        }
                    })
                })
        </script>
    </div>
</body>
</html>