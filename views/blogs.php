<html>

<head><?php require("../components/head.php");?>
    <title>Quicken Assist Support Number|Blogs</title>
    <style>
        .image {
            width: 100%;
            height: 250px;
            -o-object-fit: cover;
            object-fit: cover;
            -o-object-position: center;
            object-position: center;
        }
        .blog-card{
            height:630px;
        }
        @media(max-width:768px){
            .blog-card{
                height:auto;
            }
        }
    </style>
</head>

<body><?php require("../components/nav.php");?>
    <div class="my-overflow bg-gray">
        <br/>
        <?php 
            require('../api/blog.php'); 
            if(isset($error)){ ?>
                <div class="my-container">
                    <div class="card-panel">
                        <span >No Blog Found.</span>
                    </div>
                </div>  
           <?php  }else{ ?>
                <div class="row">
               <?php foreach($arr as $key=>$value){?>
                    <div class="col s12 m6 l4">
                        <div class="card blog-card">
                            <div class="card-image">
                                <img class="image" src="../adminpanel/assets/uploads/<?=$value['image']?>">
                                <a class="btn-floating halfway-fab waves-effect waves-light red" href="/views/blog?blog_id=<?=$value['blog_id']?>&title=<?=str_replace(" ","-",$value['title'])?>"><i class="material-icons">launch</i></a>
                            </div>
                            <div class="card-content">
                                <span class="card-title"><?=$value['title']?></span>
                                <p><?=$value['short_desc'] ?></p>
                            </div>
                        </div>
                    </div>
            <?php
               } ?>
                </div>
        <?php 
            }
       ?>
        <?php require("../components/footer.php");?>
    </div>
</body>
</html>