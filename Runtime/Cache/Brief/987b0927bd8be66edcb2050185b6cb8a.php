<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
    @media (min-width: 800px) {
        .top_title {
            text-align: center;
            font-size: 24px;
        }
        .speech_table {
            width: 85%;
            margin: 20px auto;
            border: 1px solid #ccc;
            font-size: 14px;
        }
        .apply_table .speech_table tr td {
            height: 40px;
            border: 1px solid #ccc;
        }
        .center {
            text-align: center;
        }
        .right_table {
            width: 150px;
        }
        .content {
            position: relative;
            margin: 30px 20px;
        }
        .write_name {
            position: relative;
            left: 600px;
        }
        .article_title {
            line-height: 35px;
            color: #E94C1C;
            font-size: 14px;
            font-weight: bold;
        }
        .danweixuqiu {
           margin: 10px 40px 0 40px;
        }
        .txt_no_indent tbody td{
            font: 14px/1.5 微软雅黑;
            vertical-align: top;
        }
        .zph {
            margin: 10px 40px 0 40px;
        }
        .apply_table {
            margin: 10px 40px 0 40px;
        }
     .zph img{
     width: 300px;
     height: 300px;
     transition: linear .7s;
     }
     .zph img:hover{
   /*   position: absoult;
     width: 600px;
     height: 600px; */
     transform: scale(2,2.5);
     
   
     }
    }
</style>

<div class="top_title">视频详情</div>
<div class="zph">
<?php if(empty($data['video'])): else: ?>
    <iframe height="500px" width="100%"  src="<?php echo ($data['video']); ?>" frameborder=0 'allowfullscreen'></iframe><?php endif; ?>
</div>

<!-- <?php var_dump($data) ?> -->
<script type="text/javascript">
    $(".modal-dialog > .modal-footer").hide();
</script>