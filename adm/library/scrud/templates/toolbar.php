<?php
function __toolbar($buttons = '',$conf){
?>
<div style="height: 52px;">
    <div data-spy="affix" data-offset-top="<?php echo $conf['tool_bar_position'][0] ?>"
        style="top: <?php echo $conf['tool_bar_position'][1] ?>px; width: 100%; padding-top: 5px; padding-bottom: 5px; z-index: 100;">
        <div class="container"
            style="border-bottom: 1px solid #CCC; padding-bottom: 5px; padding-top: 5px; background: #FBFBFB; background-image: linear-gradient(to bottom, #FFFFFF, #FBFBFB);">
            <div style="text-align: right; width: 100%;">
                <?php echo $buttons; ?>
            </div>
        </div>
    </div>
</div>
<?php 
}