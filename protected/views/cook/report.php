<script src="http://code.jquery.com/jquery-1.11.0.js"></script>
  <link rel="stylesheet" type="text/css" href="bootstrap-progressbar/examples/prettify/prettify.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-progressbar/examples/bootstrap/bootstrap-2.3.2.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-progressbar/css/bootstrap-progressbar-2.3.2.css">

    <style>
        /* awesome bootstrap style setup - thanks */
        .bs-sidebar.affix { position: static; }
        .bs-sidenav { margin-top: 30px; margin-bottom: 30px; padding-top: 10px; padding-bottom: 10px; text-shadow: 0 1px 0 #fff; background-color: #f7f5fa; border-radius: 5px; }
        .bs-sidenav strong { text-transform: uppercase; }
        .bs-sidebar .nav > li > a { display: block; color: #716b7a; padding: 5px 20px; }
        .bs-sidebar .nav > li > a:hover, .bs-sidebar .nav > li > a:focus { text-decoration: none; background-color: #e5e3e9; border-right: 1px solid #dbd8e0; }
        .bs-sidebar .nav > .active > a, .bs-sidebar .nav > .active:hover > a, .bs-sidebar .nav > .active:focus > a { font-weight: bold; color: #563d7c; background-color: transparent; border-right: 1px solid #563d7c; }
        .bs-sidebar .nav .nav { display: none; margin-bottom: 8px; }
        .bs-sidebar .nav .nav > li > a { padding-top: 3px; padding-bottom: 3px; padding-left: 30px; font-size: 90%; }
        .bs-example { position: relative; padding: 45px 15px 15px; margin: 0 -15px 0px; background-color: #fafafa; box-shadow: inset 0 3px 6px rgba(0,0,0,.05); border-color: #e5e5e5 #eee #eee; border-style: solid; border-width: 1px 0; }
        .bs-example:after { content: "Progress Bar For Cooks"; position: absolute; top:  15px; left: 15px; font-size: 12px; font-weight: bold; color: #bbb; text-transform: uppercase; letter-spacing: 1px; }
        .bs-example + .highlight { margin: -15px -15px 15px; border-radius: 0; border-width: 0 0 1px; }
        .highlight { padding: 9px 14px; margin-bottom: 14px; background-color: #f7f7f9; border: 1px solid #e1e1e8; border-radius: 4px; }
        .highlight pre { padding: 0; margin-top: 0; margin-bottom: 0; background-color: transparent; border: 0; white-space: nowrap; }
        .highlight pre code { font-size: inherit; color: #333; }
        .highlight pre .lineno { display: inline-block; width: 22px; padding-right: 5px; margin-right: 10px; text-align: right; color: #bebec5; }
        .bs-docs-section + .bs-docs-section { padding-top: 40px; }
        .bs-callout { margin: 20px 0; padding: 15px 30px 15px 15px; border-left: 5px solid #eee; }
        .bs-callout h4 { margin-top: 0; }
        .bs-callout p:last-child { margin-bottom: 0; }
        .bs-callout code, .bs-callout .highlight { background-color: #fff; }
        .bs-callout-danger { background-color: #fcf2f2; border-color: #dFb5b4; }
        .bs-callout-warning { background-color: #fefbed; border-color: #f1e7bc; }
        .bs-callout-info { background-color: #f0f7fd; border-color: #d0e3f0; }

        .progress .bar.six-sec-ease-in-out { -webkit-transition: width 6s ease-in-out; -moz-transition: width 6s ease-in-out; -ms-transition: width 6s ease-in-out; -o-transition: width 6s ease-in-out; transition: width 6s ease-in-out; }
        .progress.vertical .bar.six-sec-ease-in-out { -webkit-transition: height 6s ease-in-out; -moz-transition: height 6s ease-in-out; -ms-transition: height 6s ease-in-out; -o-transition: height 6s ease-in-out; transition: height 6s ease-in-out; }
        .progress.wide { width: 60px; }
        .bs-example.vertical { height: 250px; }

        pre, code {
            font-weight: bold;
            font-size: 12px;
        }
        code {
            word-break: break-all;
            white-space: normal;
        }
        pre {
            overflow: auto;
        }
        pre code {
            white-space: pre;
            overflow: auto;
            word-wrap: normal;
        }
        pre code span {
            word-break: break-all;
        }
        .hll { background-color: #515151 }
        .c { color: #999999 } /* Comment */
        .err { color: #f2777a } /* Error */
        .k { color: #cc99cc } /* Keyword */
        .l { color: #f99157 } /* Literal */
        .n { color: #cccccc } /* Name */
        .o { color: #66cccc } /* Operator */
        .p { color: #cccccc } /* Punctuation */
        .cm { color: #999999 } /* Comment.Multiline */
        .cp { color: #999999 } /* Comment.Preproc */
        .c1 { color: #999999 } /* Comment.Single */
        .cs { color: #999999 } /* Comment.Special */
        .gd { color: #f2777a } /* Generic.Deleted */
        .ge { font-style: italic } /* Generic.Emph */
        .gh { color: #cccccc; font-weight: bold } /* Generic.Heading */
        .gi { color: #99cc99 } /* Generic.Inserted */
        .gp { color: #999999; font-weight: bold } /* Generic.Prompt */
        .gs { font-weight: bold } /* Generic.Strong */
        .gu { color: #66cccc; font-weight: bold } /* Generic.Subheading */
        .kc { color: #cc99cc } /* Keyword.Constant */
        .kd { color: #cc99cc } /* Keyword.Declaration */
        .kn { color: #66cccc } /* Keyword.Namespace */
        .kp { color: #cc99cc } /* Keyword.Pseudo */
        .kr { color: #cc99cc } /* Keyword.Reserved */
        .kt { color: #ffcc66 } /* Keyword.Type */
        .ld { color: #99cc99 } /* Literal.Date */
        .m { color: #f99157 } /* Literal.Number */
        .s { color: #99cc99 } /* Literal.String */
        .na { color: #6699cc } /* Name.Attribute */
        .nb { color: #cccccc } /* Name.Builtin */
        .nc { color: #ffcc66 } /* Name.Class */
        .no { color: #f2777a } /* Name.Constant */
        .nd { color: #66cccc } /* Name.Decorator */
        .ni { color: #cccccc } /* Name.Entity */
        .ne { color: #f2777a } /* Name.Exception */
        .nf { color: #6699cc } /* Name.Function */
        .nl { color: #cccccc } /* Name.Label */
        .nn { color: #ffcc66 } /* Name.Namespace */
        .nx { color: #6699cc } /* Name.Other */
        .py { color: #cccccc } /* Name.Property */
        .nt { color: #66cccc } /* Name.Tag */
        .nv { color: #f2777a } /* Name.Variable */
        .ow { color: #66cccc } /* Operator.Word */
        .w { color: #cccccc } /* Text.Whitespace */
        .mf { color: #f99157 } /* Literal.Number.Float */
        .mh { color: #f99157 } /* Literal.Number.Hex */
        .mi { color: #f99157 } /* Literal.Number.Integer */
        .mo { color: #f99157 } /* Literal.Number.Oct */
        .sb { color: #99cc99 } /* Literal.String.Backtick */
        .sc { color: #cccccc } /* Literal.String.Char */
        .sd { color: #999999 } /* Literal.String.Doc */
        .s2 { color: #99cc99 } /* Literal.String.Double */
        .se { color: #f99157 } /* Literal.String.Escape */
        .sh { color: #99cc99 } /* Literal.String.Heredoc */
        .si { color: #f99157 } /* Literal.String.Interpol */
        .sx { color: #99cc99 } /* Literal.String.Other */
        .sr { color: #99cc99 } /* Literal.String.Regex */
        .s1 { color: #99cc99 } /* Literal.String.Single */
        .ss { color: #99cc99 } /* Literal.String.Symbol */
        .bp { color: #cccccc } /* Name.Builtin.Pseudo */
        .vc { color: #f2777a } /* Name.Variable.Class */
        .vg { color: #f2777a } /* Name.Variable.Global */
        .vi { color: #f2777a } /* Name.Variable.Instance */
        .il { color: #f99157 } /* Literal.Number.Integer.Long */
        
        @media screen and (min-width: 768px) {
            .bs-example { margin-left: 0; margin-right: 0; background-color: #fff; border-width: 1px; border-color: #ddd; border-radius: 4px 4px 0 0; box-shadow: none; }
            .bs-example + .prettyprint, .bs-example + .highlight { margin-top: -1px; margin-left: 0; margin-right: 0; border-width: 1px; border-bottom-left-radius: 4px; border-bottom-right-radius: 4px; }
        }

        @media screen and (min-width: 992px) {
            .bs-sidebar .nav > .active > ul { display: block; }
            .bs-sidebar.affix, .bs-sidebar.affix-bottom { width: 213px; }
            .bs-sidebar.affix { position: fixed; top: 55px; }
            .bs-sidebar.affix-bottom { position: absolute; }
            .bs-sidebar.affix-bottom .bs-sidenav, .bs-sidebar.affix .bs-sidenav { margin-top: 0; margin-bottom: 0; }
        }

        @media screen and (min-width: 1200px) {
            .bs-sidebar.affix-bottom, .bs-sidebar.affix { width: 263px; }
        }
    </style>

    <script type='text/javascript' src="bootstrap-progressbar/examples/query/jquery-1.8.3.min.js"></script>
    <script type='text/javascript' src="bootstrap-progressbar/examples/prettify/prettify.min.js"></script>
    <script type='text/javascript' src="bootstrap-progressbar/examples/bootstrap/bootstrap-2.3.2.min.js"></script>
    <script type="text/javascript" src="bootstrap-progressbar/bootstrap-progressbar.js"></script>

    <script type='text/javascript'>
        $(document).ready(function() {
            $('.bs-sidebar').affix({ offset: { top: $('.hero-unit').outerHeight() } });
            $('body').scrollspy({ target: '.bs-sidebar' });
            prettyPrint();
        });
    </script>
<?php

$this->breadcrumbs=array(
	'Cooks'=>array('index'),
	'Report',
);


if(isset($_GET['frmdate']) && isset($_GET['enddate']))
{

if(isset($_GET['frmdate']))
{  $frmdate= $_GET['frmdate'];

$frmdate=date('Y-m-d',  strtotime($frmdate));


if(isset($_GET['enddate']))
{    $enddate= $_GET['enddate'];
$enddate=date('Y-m-d',  strtotime($enddate));
}

    $sql="select * from 0_sales_orders where delivery_date >= '$frmdate' and  delivery_date <= '$enddate' and    trans_type =30 and order_status != 1";
    
    $command = Yii::app()->db->createCommand($sql);
$orders= $command->queryAll();
    $ordid='';        
    
foreach ($orders as $order) {
    
    $ordid.=$order['order_no'].',';
    
}

$ordid=rtrim($ordid, ",");

}

if($ordid!='')
{

$sql="SELECT c.*,cw.cook_id, COUNT( cw.order_id ) as done
FROM  `cook_work` cw,employees c  where c.id=cw.cook_id and order_id in ($ordid) and c.cat_id=2  and c.status=1
GROUP BY  `cook_id`  order by done desc ";
$command = Yii::app()->db->createCommand($sql);
$orders= $command->queryAll();
}

}
?>
<div class="row-fluid space-12">
    <div class="span-6">
<form action="index.php" method="GET">

    <input type="hidden" value="cook/report" name="r"  />
<div class="widget-box" style="width: 600px">
          <div class="widget-header">
           <h4>Select Report dates</h4>
          </div>

          <div class="widget-body">
           <div class="widget-main">
<div class="form">
	<div class="row">
            <label>Start Date</label>	
            <input type="text" id="dpd1" required value="<?php if(isset($_GET['frmdate'])) { echo $_GET['frmdate']; } ?>" name="frmdate" />
	</div>

	
    
	<div class="row">
            <label>End Date</label>	
            <input type="text" id="dpd2" required value="<?php if(isset($_GET['enddate'])) { echo $_GET['enddate']; } ?>"  name="enddate" />
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-success')); ?>
	</div>


        
        
</div></div></div>
</div><!-- form -->

</form>
    </div>
</div>
    <div class="row-fluid space-12">
    <div class="span-6">
        <style>
            
            .progress.vertical .bar.six-sec-ease-in-out {
    -webkit-transition: height 6s ease-in-out;
    -moz-transition: height 6s ease-in-out;
    -ms-transition: height 6s ease-in-out;
    -o-transition: height 6s ease-in-out;
    transition: height 6s ease-in-out;
}


        </style>
       
                    <div class="bs-example vertical bottom v-bottom-animation ">
                        <?php if(isset($_GET['frmdate']) && isset($_GET['enddate']))
{ $toal_work=0;
                            foreach ($orders as $order)  
                            {             
                                //$toal_work=$order['done'];
                                
                                if($toal_work<$order['done'])
                                {
                                    $toal_work=$order['done'];
                                }
                                
                            }
                             foreach ($orders as $order)  
                            {             
                            //    $toal_work+=$order['done'];
                            
                            $work=$order['done']/$toal_work*90;
                            if($work >80)
                                $class='bar-success';
                               
                            
                            elseif($work >60)
                                $class='bar-warning';
                            
                            elseif($work >40)
                                 $class='bar-info';
                            
                            elseif($work >20)
                                
                                 $class='bar-danger';
                               
                            else
                                $class='';
                            
                            
                            ?>
                        
                        
                        <div class="progress vertical bottom wide">
                       <?php echo $order['name']; ?>     <div class="bar <?php echo $class ?> six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="<?php echo $work ?>"><?php echo $order['done']?></div>
                        </div>
                             <?php } } ?>
                   
                      
                    </div>
          
          
    </div>
      <script type='text/javascript'>
                            $(document).ready(function() {
                               
                                    $('.v-bottom-animation .bar').progressbar();
                              //  });
                            });
                        </script>
    </div>
<?php if(isset($_GET['frmdate']) && isset($_GET['enddate']))
{ ?>
  <div class="row-fluid">

    
                            <div class="table-header">
                                Sorted By Work</div>
                            
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            
                                            <th>Done order</th>
                                            
                                          
                                        </tr>
                                    </thead>
                                                            
                                    <tbody>
                            <?php  foreach ($orders as $order) { ?>
                     <tr>
                                            <td><?php echo $order['name'] ?></td>
                                            
                                            <td><?php echo $order['done'] ?></td>
                                            
                                          
                                        </tr>	
                            <?php }
                            
                            if(count($orders)==0)
                            { ?>
                                        <tr><td colspan="3">No Record in selected dates</td></tr>
                                
                           <?php }  ?>
                                     
                                        
                                    </tbody>
                                </table>
                            
                        </div>


<?php } ?>