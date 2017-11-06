<?php
/**
 * Created by JetBrains PhpStorm.
 * User: xinshi
 * Date: 15-5-8
 * Time: 下午6:40
 * To change this template use File | Settings | File Templates.
 */
class RecoTemplate extends BaseTemplate{

function __construct($wikiPostsInfo,$filepath){

    if(!@$wikiPostsInfo['rs']){
        $this->PostsInfo = $wikiPostsInfo;
        $this->str_page = $wikiPostsInfo['page_str'];
    }else{
        $this->str_page = '';
    }

    $this->filepath = $filepath;

    $path2 = substr($filepath,0,strrpos($filepath,"/"));

    $this->linkFile = $path2."/wiki_posts_Link_data.html";
}
    function execute() {
?>
        <?php global $wgWikiStatic,$wgServer,$wgStaticUrl;?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <link href="<?php echo $wgStaticUrl?>/pc/wiki/discuss/css/discuss.css" rel="stylesheet" type="text/css">
        <title>回收站</title>
        <div id="wrapper">
            <!--title-->
            <div class="joyme-rmsy-tab-tit" id="tab">
                <p class="cur" id="tab_1">
                    <a href="<?php echo $wgServer;?>/?title=特殊:Wiki讨论区">全部帖子</a>
                </p>
                <em>/</em>
                <p id="tab_2">
                    <a href="<?php echo $wgServer;?>/?title=特殊:Wiki讨论区&type=1">精品帖子</a>
                </p>
            </div>
            <div class="discuss-title">
                <span>回收站</span>
                <input type="button" value="恢复" onclick="reduction()">
            </div>
            <!--title end-->
            <!--main-->
            <div class="discuss-main">
                <!--disuss left-->
                <div class="dis-left">
                    <input type="hidden" value="<?=$wgServer?>" id="url">
                <?php if(!empty($this->PostsInfo)):?>
                <?php foreach($this->PostsInfo as $k=>$v):?>
                    <?php if(is_numeric($k)):?>

                    <div class="tab-cont-list">
                        <span><?=$v['comments_num']?></span>

                        <a href="<?php echo $wgServer;?>/?title=特殊:Wiki讨论区&details=<?=$v['wiki_title']?>&namespace=<?=$v['page_namespace']?>"><?=$v['wiki_title']?></a>
                        <?php if($v['is_essence'] == 1):?>
                            <i class="i-red">精品</i>
                        <?php else:?>
                            <i></i>
                        <?php endif;?>
                        <div class="joyme-author">
                            <?php if(ctype_alnum($v['user_name']) || is_numeric($v['user_name'])){
                                $length = 7;
                            }else{
                                $length = 7;
                            }?>
                            <?php $name = mb_substr($v['user_name'],0,$length,'utf-8');?>
                            <cite><?=$name?></cite>
                            <label>
                                <input type="checkbox" value="<?=$v['page_id'];?>" name="one"> 勾选
                            </label>
                        </div>
                    </div>
                    <?php endif;?>
                <?php endforeach;?>
                    <?php else:?>
                        暂无数据
                    <?php endif;?>

                </div>
                <!--disuss left end-->

                <div class="pager">
                    <?php echo $this->str_page;?>
                </div>
                <!--disuss rigth-->
                <div class="dis-right">
<!--                    <div class="dis-promote">-->
<!--                        <a href="">-->
<!--                            <cite><img src="/resources/src/mediawiki.posts/images/left-img.jpg"></cite>-->
<!--                            <span>推广</span>-->
<!--                        </a>-->
<!--                    </div>-->
                    <!--hot top-->
                    <div class="dis-right-box">
                        <?php @include_once($this->filepath)?>
                    </div>
                    <!--hot top  end-->
                    <!--link-->
                    <div class="dis-right-box">
                        <div class="hot-tit">友情讨论区
<!--                            <a href="">设置</a>-->
                        </div>
                        <div class="recommend-wiki">
                            <?php @include_once($this->linkFile)?>
                        </div>
                    </div>
                    <!--hot top  end-->
                </div>
                <!--disuss rigth end-->
            </div>
            <!--main end-->
        </div>
        <script type="text/javascript" src="<?php echo $wgStaticUrl?>/js/jquery-1.9.1.min.js"></script>
        <script src="<?php echo $wgWikiStatic;?>/extensions/jsscripts/wikiPosts.js"></script>
<?php
}
}
?>
