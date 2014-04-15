<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>bootstrap-progressbar.js 0.7.0 for bootstrap 2.3.2</title>

    <link rel="stylesheet" type="text/css" href="prettify/prettify.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap-2.3.2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-progressbar-2.3.2.css">

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
        .bs-example:after { content: "Example"; position: absolute; top:  15px; left: 15px; font-size: 12px; font-weight: bold; color: #bbb; text-transform: uppercase; letter-spacing: 1px; }
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

    <script type='text/javascript' src="jquery/jquery-1.8.3.min.js"></script>
    <script type='text/javascript' src="prettify/prettify.min.js"></script>
    <script type='text/javascript' src="bootstrap/bootstrap-2.3.2.min.js"></script>
    <script type="text/javascript" src="../bootstrap-progressbar.js"></script>

    <script type='text/javascript'>
        $(document).ready(function() {
            $('.bs-sidebar').affix({ offset: { top: $('.hero-unit').outerHeight() } });
            $('body').scrollspy({ target: '.bs-sidebar' });
            prettyPrint();
        });
    </script>
</head>
<body>
    <a href="https://github.com/minddust/bootstrap-progressbar"><img style="position: fixed; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_orange_ff7600.png" alt="Fork me on GitHub"></a>
    <div class="container">
        <div class="hero-unit">
            <h1>bootstrap-progressbar - v0.7.0</h1>
            <p class="lead">examples running with jQuery v1.8.3 and bootstrap v2.3.2</p>
        </div>
        <div class="row">
            <div class="span3">
                <div class="bs-sidebar">
                    <ul class="nav bs-sidenav">
                        <li class="text-center"><strong>horizontal</strong></li>
                        <li>
                            <a href="#h-default">default settings</a>
                            <ul class="nav">
                                <li><a href="#h-default-basic">basic</a></li>
                                <li><a href="#h-default-themed">themed</a></li>
                                <li><a href="#h-default-striped">striped</a></li>
                                <li><a href="#h-default-animated">animated</a></li>
                                <li><a href="#h-default-aria">custom aria range</a></li>
                                <li><a href="#h-default-animation">custom animation</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#h-right">default settings (right)</a>
                            <ul class="nav">
                                <li><a href="#h-right-basic">basic</a></li>
                                <li><a href="#h-right-themed">themed</a></li>
                                <li><a href="#h-right-striped">striped</a></li>
                                <li><a href="#h-right-animated">animated</a></li>
                                <li><a href="#h-right-aria">custom aria range</a></li>
                                <li><a href="#h-right-animation">custom animation</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#h-fill">filled text</a>
                            <ul class="nav">
                                <li><a href="#h-fill-basic">basic</a></li>
                                <li><a href="#h-fill-themed">themed</a></li>
                                <li><a href="#h-fill-striped">striped</a></li>
                                <li><a href="#h-fill-animated">animated</a></li>
                                <li><a href="#h-fill-aria">custom aria range</a></li>
                                <li><a href="#h-fill-animation">custom animation</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#h-fill-nonpercentage">filled text (nonpercentage)</a>
                            <ul class="nav">
                                <li><a href="#h-fill-nonpercentage-basic">basic</a></li>
                                <li><a href="#h-fill-nonpercentage-themed">themed</a></li>
                                <li><a href="#h-fill-nonpercentage-striped">striped</a></li>
                                <li><a href="#h-fill-nonpercentage-animated">animated</a></li>
                                <li><a href="#h-fill-nonpercentage-aria">custom aria range</a></li>
                                <li><a href="#h-fill-nonpercentage-animation">custom animation</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#h-center">centered text</a>
                            <ul class="nav">
                                <li><a href="#h-center-basic">basic</a></li>
                                <li><a href="#h-center-themed">themed</a></li>
                                <li><a href="#h-center-striped">striped</a></li>
                                <li><a href="#h-center-animated">animated</a></li>
                                <li><a href="#h-center-aria">custom aria range</a></li>
                                <li><a href="#h-center-animation">custom animation</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#h-center-nonpercentage">centered text (nonpercentage)</a>
                            <ul class="nav">
                                <li><a href="#h-center-nonpercentage-basic">basic</a></li>
                                <li><a href="#h-center-nonpercentage-themed">themed</a></li>
                                <li><a href="#h-center-nonpercentage-striped">striped</a></li>
                                <li><a href="#h-center-nonpercentage-animated">animated</a></li>
                                <li><a href="#h-center-nonpercentage-aria">custom aria range</a></li>
                                <li><a href="#h-center-nonpercentage-animation">custom animation</a></li>
                            </ul>
                        </li>
                        <li class="text-center"><strong>vertical</strong></li>
                        <li>
                            <a href="#v-default">default settings</a>
                            <ul class="nav">
                                <li><a href="#v-default-basic">basic</a></li>
                                <li><a href="#v-default-themed">themed</a></li>
                                <li><a href="#v-default-striped">striped</a></li>
                                <li><a href="#v-default-animated">animated</a></li>
                                <li><a href="#v-default-aria">custom aria range</a></li>
                                <li><a href="#v-default-animation">custom animation</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#v-bottom">default settings (bottom)</a>
                            <ul class="nav">
                                <li><a href="#v-bottom-basic">basic</a></li>
                                <li><a href="#v-bottom-themed">themed</a></li>
                                <li><a href="#v-bottom-striped">striped</a></li>
                                <li><a href="#v-bottom-animated">animated</a></li>
                                <li><a href="#v-bottom-aria">custom aria range</a></li>
                                <li><a href="#v-bottom-animation">custom animation</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#v-fill">filled text</a>
                            <ul class="nav">
                                <li><a href="#v-fill-basic">basic</a></li>
                                <li><a href="#v-fill-themed">themed</a></li>
                                <li><a href="#v-fill-striped">striped</a></li>
                                <li><a href="#v-fill-animated">animated</a></li>
                                <li><a href="#v-fill-aria">custom aria range</a></li>
                                <li><a href="#v-fill-animation">custom animation</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#v-fill-nonpercentage">filled text (nonpercentage)</a>
                            <ul class="nav">
                                <li><a href="#v-fill-nonpercentage-basic">basic</a></li>
                                <li><a href="#v-fill-nonpercentage-themed">themed</a></li>
                                <li><a href="#v-fill-nonpercentage-striped">striped</a></li>
                                <li><a href="#v-fill-nonpercentage-animated">animated</a></li>
                                <li><a href="#v-fill-nonpercentage-aria">custom aria range</a></li>
                                <li><a href="#v-fill-nonpercentage-animation">custom animation</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#v-center">centered text</a>
                            <ul class="nav">
                                <li><a href="#v-center-basic">basic</a></li>
                                <li><a href="#v-center-themed">themed</a></li>
                                <li><a href="#v-center-striped">striped</a></li>
                                <li><a href="#v-center-animated">animated</a></li>
                                <li><a href="#v-center-aria">custom aria range</a></li>
                                <li><a href="#v-center-animation">custom animation</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#v-center-nonpercentage">centered text (nonpercentage)</a>
                            <ul class="nav">
                                <li><a href="#v-center-nonpercentage-basic">basic</a></li>
                                <li><a href="#v-center-nonpercentage-themed">themed</a></li>
                                <li><a href="#v-center-nonpercentage-striped">striped</a></li>
                                <li><a href="#v-center-nonpercentage-animated">animated</a></li>
                                <li><a href="#v-center-nonpercentage-aria">custom aria range</a></li>
                                <li><a href="#v-center-nonpercentage-animation">custom animation</a></li>
                            </ul>
                        </li>
                        <li class="text-center"><strong>miscellaneous</strong></li>
                        <li><a href="#m-delay">transition delay</a></li>
                        <li><a href="#m-refresh-speed">refresh speed</a></li>
                        <li><a href="#m-callback">callbacks</a></li>
                        <li><a href="#m-error">error</a></li>
                        <li><a href="#m-custom-percentage-format">custom percent format</a></li>
                        <li><a href="#m-custom-amount-format">custom amount format</a></li>
                        <li><a href="#m-multi-trigger-0">multi trigger</a></li>
                    </ul>
                </div>
            </div>
            <div class="span9">
                <div class="bs-callout bs-callout-info">all examples have to be triggered manually by clicking the <button type="button" class="btn btn-primary" id="">start</button> button.</div>
                <div class="bs-docs-section">
                    <div class="page-header">
                        <h1 id="h-default">default settings</h1>
                    </div>
                    <p class="lead">this is just plain default behavior.</p>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>Progressbar.defaults = {
    transition_delay: 300,
    refresh_speed: 50,
    display_text: 'none',
    use_percentage: true,
    update: $.noop,
    done: $.noop,
    fail: $.noop
};</code>
                        </pre>
                    </div>
                    <h3>basic progressbar <button type="button" class="btn btn-primary" id="h-default-basic">start</button></h3>
                    <div class="bs-example h-default-basic">
                        <div class="progress">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-default-basic').click(function() {
                                    $('.h-default-basic .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;75&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                    <h3>themed progressbars <button type="button" class="btn btn-primary" id="h-default-themed">start</button></h3>
                    <div class="bs-example h-default-themed">
                        <div class="progress">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-default-themed').click(function() {
                                    $('.h-default-themed .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                    <h3>striped progressbars <button type="button" class="btn btn-primary" id="h-default-striped">start</button></h3>
                    <div class="bs-example h-default-striped">
                        <div class="progress progress-striped">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-default-striped').click(function() {
                                    $('.h-default-striped .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                    <h3>animated progressbars <button type="button" class="btn btn-primary" id="h-default-animated">start</button></h3>
                    <div class="bs-example h-default-animated">
                        <div class="progress progress-striped active">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress progress-striped active">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress progress-striped active">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress progress-striped active">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress progress-striped active">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-default-animated').click(function() {
                                    $('.h-default-animated .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                    <h3>custom aria range <button type="button" class="btn btn-primary" id="h-default-aria">start</button></h3>
                    <div class="bs-example h-default-aria">
                        <div class="progress">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="2" aria-valuemin="1" aria-valuemax="6"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40" aria-valuemin="-40" aria-valuemax="200"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60" aria-valuemax="120"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80" aria-valuemin="30" ></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-default-aria').click(function() {
                                    $('.h-default-aria .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;2&quot; aria-valuemin=&quot;1&quot; aria-valuemax=&quot;6&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot; aria-valuemin=&quot;-40&quot; aria-valuemax=&quot;200&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot; aria-valuemax=&quot;120&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot; aria-valuemin=&quot;30&quot; &gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                    <h3>custom animations <button type="button" class="btn btn-primary" id="h-default-animation">start</button></h3>
                    <div class="bs-example h-default-animation">
                        <div class="progress">
                            <div class="bar six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-info six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-success six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-warning six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-danger six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-default-animation').click(function() {
                                    $('.h-default-animation .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>.progress .bar.six-sec-ease-in-out {
    -webkit-transition: width 6s ease-in-out;
    -moz-transition: width 6s ease-in-out;
    -ms-transition: width 6s ease-in-out;
    -o-transition: width 6s ease-in-out;
    transition: width 6s ease-in-out;
}
</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-info six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-success six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-warning six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-danger six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                </div>
                <div class="bs-docs-section">
                    <div class="page-header">
                        <h1 id="h-right">default settings (right)</h1>
                    </div>
                    <p class="lead">this is just plain default behavior - right aligned.</p>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>Progressbar.defaults = {
    transition_delay: 300,
    refresh_speed: 50,
    display_text: 'none',
    use_percentage: true,
    update: $.noop,
    done: $.noop,
    fail: $.noop
};</code>
                        </pre>
                    </div>
                    <h3>basic progressbar <button type="button" class="btn btn-primary" id="h-right-basic">start</button></h3>
                    <div class="bs-example h-right-basic">
                        <div class="progress right">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-right-basic').click(function() {
                                    $('.h-right-basic .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress right&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;75&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                    <h3>themed progressbars <button type="button" class="btn btn-primary" id="h-right-themed">start</button></h3>
                    <div class="bs-example h-right-themed">
                        <div class="progress right">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress right">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress right">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress right">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-right-themed').click(function() {
                                    $('.h-right-themed .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress right&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress right&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress right&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress right&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                    <h3>striped progressbars <button type="button" class="btn btn-primary" id="h-right-striped">start</button></h3>
                    <div class="bs-example h-right-striped">
                        <div class="progress progress-striped right">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress progress-striped right">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress progress-striped right">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress progress-striped right">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress progress-striped right">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-right-striped').click(function() {
                                    $('.h-right-striped .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped right&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped right&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped right&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped right&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped right&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                    <h3>animated progressbars <button type="button" class="btn btn-primary" id="h-right-animated">start</button></h3>
                    <div class="bs-example h-right-animated">
                        <div class="progress progress-striped right active">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress progress-striped right active">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress progress-striped right active">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress progress-striped right active">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress progress-striped right active">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-right-animated').click(function() {
                                    $('.h-right-animated .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped right active&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped right active&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped right active&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped right active&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped right active&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                    <h3>custom aria range <button type="button" class="btn btn-primary" id="h-right-aria">start</button></h3>
                    <div class="bs-example h-right-aria">
                        <div class="progress right">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="2" aria-valuemin="1" aria-valuemax="6"></div>
                        </div>
                        <div class="progress right">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40" aria-valuemin="-40" aria-valuemax="200"></div>
                        </div>
                        <div class="progress right">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60" aria-valuemax="120"></div>
                        </div>
                        <div class="progress right">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80" aria-valuemin="30" ></div>
                        </div>
                        <div class="progress right">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-right-aria').click(function() {
                                    $('.h-right-aria .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress right&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;2&quot; aria-valuemin=&quot;1&quot; aria-valuemax=&quot;6&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress right&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot; aria-valuemin=&quot;-40&quot; aria-valuemax=&quot;200&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress right&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot; aria-valuemax=&quot;120&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress right&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot; aria-valuemin=&quot;30&quot; &gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress right&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                    <h3>custom animations <button type="button" class="btn btn-primary" id="h-right-animation">start</button></h3>
                    <div class="bs-example h-right-animation">
                        <div class="progress right">
                            <div class="bar six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress right">
                            <div class="bar bar-info six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress right">
                            <div class="bar bar-success six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress right">
                            <div class="bar bar-warning six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress right">
                            <div class="bar bar-danger six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-right-animation').click(function() {
                                    $('.h-right-animation .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>.progress .bar.six-sec-ease-in-out {
    -webkit-transition: width 6s ease-in-out;
    -moz-transition: width 6s ease-in-out;
    -ms-transition: width 6s ease-in-out;
    -o-transition: width 6s ease-in-out;
    transition: width 6s ease-in-out;
}
</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress right&quot;&gt;
    &lt;div class=&quot;bar six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress right&quot;&gt;
    &lt;div class=&quot;bar bar-info six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress right&quot;&gt;
    &lt;div class=&quot;bar bar-success six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress right&quot;&gt;
    &lt;div class=&quot;bar bar-warning six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress right&quot;&gt;
    &lt;div class=&quot;bar bar-danger six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                </div>
                <div class="bs-docs-section">
                    <div class="page-header">
                        <h1 id="h-fill">filled text</h1>
                    </div>
                    <p class="lead">the following examples are showing how to display text on the filled bar.</p>
                    <h3>basic progressbar <button type="button" class="btn btn-primary" id="h-fill-basic">start</button></h3>
                    <div class="bs-example h-fill-basic">
                        <div class="progress">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-fill-basic').click(function() {
                                    $('.h-fill-basic .bar').progressbar({display_text: 'fill'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;75&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'fill'});</code>
                        </pre>
                    </div>
                    <h3>themed progressbars <button type="button" class="btn btn-primary" id="h-fill-themed">start</button></h3>
                    <div class="bs-example h-fill-themed">
                        <div class="progress">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-fill-themed').click(function() {
                                    $('.h-fill-themed .bar').progressbar({display_text: 'fill'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'fill'});</code>
                        </pre>
                    </div>
                    <h3>striped progressbars <button type="button" class="btn btn-primary" id="h-fill-striped">start</button></h3>
                    <div class="bs-example h-fill-striped">
                        <div class="progress progress-striped">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-fill-striped').click(function() {
                                    $('.h-fill-striped .bar').progressbar({display_text: 'fill'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'fill'});</code>
                        </pre>
                    </div>
                    <h3>animated progressbars <button type="button" class="btn btn-primary" id="h-fill-animated">start</button></h3>
                    <div class="bs-example h-fill-animated">
                        <div class="progress progress-striped active">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress progress-striped active">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress progress-striped active">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress progress-striped active">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress progress-striped active">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-fill-animated').click(function() {
                                    $('.h-fill-animated .bar').progressbar({display_text: 'fill'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'fill'});</code>
                        </pre>
                    </div>
                    <h3>custom aria range <button type="button" class="btn btn-primary" id="h-fill-aria">start</button></h3>
                    <div class="bs-example h-fill-aria">
                        <div class="progress">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="2" aria-valuemin="1" aria-valuemax="6"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40" aria-valuemin="-40" aria-valuemax="200"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60" aria-valuemax="120"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80" aria-valuemin="30" ></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-fill-aria').click(function() {
                                    $('.h-fill-aria .bar').progressbar({display_text: 'fill'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;2&quot; aria-valuemin=&quot;1&quot; aria-valuemax=&quot;6&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot; aria-valuemin=&quot;-40&quot; aria-valuemax=&quot;200&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot; aria-valuemax=&quot;120&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot; aria-valuemin=&quot;30&quot; &gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'fill'});</code>
                        </pre>
                    </div>
                    <h3>custom animations <button type="button" class="btn btn-primary" id="h-fill-animation">start</button></h3>
                    <div class="bs-example h-fill-animation">
                        <div class="progress">
                            <div class="bar six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-info six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-success six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-warning six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-danger six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-fill-animation').click(function() {
                                    $('.h-fill-animation .bar').progressbar({display_text: 'fill'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>.progress .bar.six-sec-ease-in-out {
    -webkit-transition: width 6s ease-in-out;
    -moz-transition: width 6s ease-in-out;
    -ms-transition: width 6s ease-in-out;
    -o-transition: width 6s ease-in-out;
    transition: width 6s ease-in-out;
}
</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-info six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-success six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-warning six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-danger six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'fill'});</code>
                        </pre>
                    </div>
                </div>
                <div class="bs-docs-section">
                    <div class="page-header">
                        <h1 id="h-fill-nonpercentage">filled text (nonpercentage)</h1>
                    </div>
                    <p class="lead">the following examples are showing how to display nonpercentage text on the filled bar.</p>
                    <h3>basic progressbar <button type="button" class="btn btn-primary" id="h-fill-nonpercentage-basic">start</button></h3>
                    <div class="bs-example h-fill-nonpercentage-basic">
                        <div class="progress">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-fill-nonpercentage-basic').click(function() {
                                    $('.h-fill-nonpercentage-basic .bar').progressbar({display_text: 'fill', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;75&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'fill',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                    <h3>themed progressbars <button type="button" class="btn btn-primary" id="h-fill-nonpercentage-themed">start</button></h3>
                    <div class="bs-example h-fill-nonpercentage-themed">
                        <div class="progress">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-fill-nonpercentage-themed').click(function() {
                                    $('.h-fill-nonpercentage-themed .bar').progressbar({display_text: 'fill', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'fill',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                    <h3>striped progressbars <button type="button" class="btn btn-primary" id="h-fill-nonpercentage-striped">start</button></h3>
                    <div class="bs-example h-fill-nonpercentage-striped">
                        <div class="progress progress-striped">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-fill-nonpercentage-striped').click(function() {
                                    $('.h-fill-nonpercentage-striped .bar').progressbar({display_text: 'fill', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'fill',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                    <h3>animated progressbars <button type="button" class="btn btn-primary" id="h-fill-nonpercentage-animated">start</button></h3>
                    <div class="bs-example h-fill-nonpercentage-animated">
                        <div class="progress progress-striped active">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress progress-striped active">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress progress-striped active">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress progress-striped active">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress progress-striped active">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-fill-nonpercentage-animated').click(function() {
                                    $('.h-fill-nonpercentage-animated .bar').progressbar({display_text: 'fill', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'fill',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                    <h3>custom aria range <button type="button" class="btn btn-primary" id="h-fill-nonpercentage-aria">start</button></h3>
                    <div class="bs-example h-fill-nonpercentage-aria">
                        <div class="progress">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="2" aria-valuemin="1" aria-valuemax="6"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40" aria-valuemin="-40" aria-valuemax="200"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60" aria-valuemax="120"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80" aria-valuemin="30" ></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-fill-nonpercentage-aria').click(function() {
                                    $('.h-fill-nonpercentage-aria .bar').progressbar({display_text: 'fill', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;2&quot; aria-valuemin=&quot;1&quot; aria-valuemax=&quot;6&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot; aria-valuemin=&quot;-40&quot; aria-valuemax=&quot;200&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot; aria-valuemax=&quot;120&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot; aria-valuemin=&quot;30&quot; &gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'fill',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                    <h3>custom animations <button type="button" class="btn btn-primary" id="h-fill-nonpercentage-animation">start</button></h3>
                    <div class="bs-example h-fill-nonpercentage-animation">
                        <div class="progress">
                            <div class="bar six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-info six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-success six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-warning six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-danger six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-fill-nonpercentage-animation').click(function() {
                                    $('.h-fill-nonpercentage-animation .bar').progressbar({display_text: 'fill', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>.progress .bar.six-sec-ease-in-out {
    -webkit-transition: width 6s ease-in-out;
    -moz-transition: width 6s ease-in-out;
    -ms-transition: width 6s ease-in-out;
    -o-transition: width 6s ease-in-out;
    transition: width 6s ease-in-out;
}
</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-info six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-success six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-warning six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-danger six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'fill',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                </div>
                <div class="bs-docs-section">
                    <div class="page-header">
                        <h1 id="h-center">centered text</h1>
                    </div>
                    <p class="lead">the following examples are showing how to display centered text on the bar.</p>
                    <h3>basic progressbar <button type="button" class="btn btn-primary" id="h-center-basic">start</button></h3>
                    <div class="bs-example h-center-basic">
                        <div class="progress">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-center-basic').click(function() {
                                    $('.h-center-basic .bar').progressbar({display_text: 'center'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;75&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'center'});</code>
                        </pre>
                    </div>
                    <h3>themed progressbars <button type="button" class="btn btn-primary" id="h-center-themed">start</button></h3>
                    <div class="bs-example h-center-themed">
                        <div class="progress">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="25"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="49"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="51"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-center-themed').click(function() {
                                    $('.h-center-themed .bar').progressbar({display_text: 'center'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'center'});</code>
                        </pre>
                    </div>
                    <h3>striped progressbars <button type="button" class="btn btn-primary" id="h-center-striped">start</button></h3>
                    <div class="bs-example h-center-striped">
                        <div class="progress progress-striped">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="25"></div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="49"></div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="50"></div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="51"></div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-center-striped').click(function() {
                                    $('.h-center-striped .bar').progressbar({display_text: 'center'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'center'});</code>
                        </pre>
                    </div>
                    <h3>animated progressbars <button type="button" class="btn btn-primary" id="h-center-animated">start</button></h3>
                    <div class="bs-example h-center-animated">
                        <div class="progress progress-striped active">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="25"></div>
                        </div>
                        <div class="progress progress-striped active">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="49"></div>
                        </div>
                        <div class="progress progress-striped active">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="50"></div>
                        </div>
                        <div class="progress progress-striped active">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="51"></div>
                        </div>
                        <div class="progress progress-striped active">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-center-animated').click(function() {
                                    $('.h-center-animated .bar').progressbar({display_text: 'center'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'center'});</code>
                        </pre>
                    </div>
                    <h3>custom aria range <button type="button" class="btn btn-primary" id="h-center-aria">start</button></h3>
                    <div class="bs-example h-center-aria">
                        <div class="progress">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="2" aria-valuemin="1" aria-valuemax="6"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40" aria-valuemin="-40" aria-valuemax="200"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60" aria-valuemax="120"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80" aria-valuemin="30" ></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-center-aria').click(function() {
                                    $('.h-center-aria .bar').progressbar({display_text: 'center'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;2&quot; aria-valuemin=&quot;1&quot; aria-valuemax=&quot;6&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot; aria-valuemin=&quot;-40&quot; aria-valuemax=&quot;200&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot; aria-valuemax=&quot;120&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot; aria-valuemin=&quot;30&quot; &gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'center'});</code>
                        </pre>
                    </div>
                    <h3>custom animations <button type="button" class="btn btn-primary" id="h-center-animation">start</button></h3>
                    <div class="bs-example h-center-animation">
                        <div class="progress">
                            <div class="bar six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-info six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-success six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-warning six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-danger six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-center-animation').click(function() {
                                    $('.h-center-animation .bar').progressbar({display_text: 'center'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>.progress .bar.six-sec-ease-in-out {
    -webkit-transition: width 6s ease-in-out;
    -moz-transition: width 6s ease-in-out;
    -ms-transition: width 6s ease-in-out;
    -o-transition: width 6s ease-in-out;
    transition: width 6s ease-in-out;
}
</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-info six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-success six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-warning six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-danger six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'center'});</code>
                        </pre>
                    </div>
                </div>
                <div class="bs-docs-section">
                    <div class="page-header">
                        <h1 id="h-center-nonpercentage">centered text (nonpercentage)</h1>
                    </div>
                    <p class="lead">the following examples are showing how to display nonpercentage centered text on the bar.</p>
                    <h3>basic progressbar <button type="button" class="btn btn-primary" id="h-center-nonpercentage-basic">start</button></h3>
                    <div class="bs-example h-center-nonpercentage-basic">
                        <div class="progress">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-center-nonpercentage-basic').click(function() {
                                    $('.h-center-nonpercentage-basic .bar').progressbar({display_text: 'center', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;75&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'center',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                    <h3>themed progressbars <button type="button" class="btn btn-primary" id="h-center-nonpercentage-themed">start</button></h3>
                    <div class="bs-example h-center-nonpercentage-themed">
                        <div class="progress">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="25"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="49"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="51"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-center-nonpercentage-themed').click(function() {
                                    $('.h-center-nonpercentage-themed .bar').progressbar({display_text: 'center', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'center',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                    <h3>striped progressbars <button type="button" class="btn btn-primary" id="h-center-nonpercentage-striped">start</button></h3>
                    <div class="bs-example h-center-nonpercentage-striped">
                        <div class="progress progress-striped">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="25"></div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="49"></div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="50"></div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="51"></div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-center-nonpercentage-striped').click(function() {
                                    $('.h-center-nonpercentage-striped .bar').progressbar({display_text: 'center', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'center',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                    <h3>animated progressbars <button type="button" class="btn btn-primary" id="h-center-nonpercentage-animated">start</button></h3>
                    <div class="bs-example h-center-nonpercentage-animated">
                        <div class="progress progress-striped active">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="25"></div>
                        </div>
                        <div class="progress progress-striped active">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="49"></div>
                        </div>
                        <div class="progress progress-striped active">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="50"></div>
                        </div>
                        <div class="progress progress-striped active">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="51"></div>
                        </div>
                        <div class="progress progress-striped active">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-center-nonpercentage-animated').click(function() {
                                    $('.h-center-nonpercentage-animated .bar').progressbar({display_text: 'center', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped active&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'center',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                    <h3>custom aria range <button type="button" class="btn btn-primary" id="h-center-nonpercentage-aria">start</button></h3>
                    <div class="bs-example h-center-nonpercentage-aria">
                        <div class="progress">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="2" aria-valuemin="1" aria-valuemax="6"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40" aria-valuemin="-40" aria-valuemax="200"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60" aria-valuemax="120"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80" aria-valuemin="30" ></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-center-nonpercentage-aria').click(function() {
                                    $('.h-center-nonpercentage-aria .bar').progressbar({display_text: 'center', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;2&quot; aria-valuemin=&quot;1&quot; aria-valuemax=&quot;6&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot; aria-valuemin=&quot;-40&quot; aria-valuemax=&quot;200&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot; aria-valuemax=&quot;120&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot; aria-valuemin=&quot;30&quot; &gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'center',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                    <h3>custom animations <button type="button" class="btn btn-primary" id="h-center-nonpercentage-animation">start</button></h3>
                    <div class="bs-example h-center-nonpercentage-animation">
                        <div class="progress">
                            <div class="bar six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-info six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-success six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-warning six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-danger six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#h-center-nonpercentage-animation').click(function() {
                                    $('.h-center-nonpercentage-animation .bar').progressbar({display_text: 'center', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>.progress .bar.six-sec-ease-in-out {
    -webkit-transition: width 6s ease-in-out;
    -moz-transition: width 6s ease-in-out;
    -ms-transition: width 6s ease-in-out;
    -o-transition: width 6s ease-in-out;
    transition: width 6s ease-in-out;
}
</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-info six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-success six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-warning six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-danger six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'center',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                </div>
                <div class="bs-docs-section">
                    <div class="page-header">
                        <h1 id="v-default">default settings</h1>
                    </div>
                    <p class="lead">this is just plain default behavior.</p>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>Progressbar.defaults = {
    transition_delay: 300,
    refresh_speed: 50,
    display_text: 'none',
    use_percentage: true,
    update: $.noop,
    done: $.noop,
    fail: $.noop
};</code>
                        </pre>
                    </div>
                    <h3>basic progressbar <button type="button" class="btn btn-primary" id="v-default-basic">start</button></h3>
                    <div class="bs-example vertical v-default-basic">
                        <div class="progress vertical wide">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-default-basic').click(function() {
                                    $('.v-default-basic .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;75&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                    <h3>themed progressbars <button type="button" class="btn btn-primary" id="v-default-themed">start</button></h3>
                    <div class="bs-example vertical v-default-themed">
                        <div class="progress vertical wide">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-default-themed').click(function() {
                                    $('.v-default-themed .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                    <h3>striped progressbars <button type="button" class="btn btn-primary" id="v-default-striped">start</button></h3>
                    <div class="bs-example vertical v-default-striped">
                        <div class="progress progress-striped vertical wide">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress progress-striped vertical wide">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress progress-striped vertical wide">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress progress-striped vertical wide">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress progress-striped vertical wide">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-default-striped').click(function() {
                                    $('.v-default-striped .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                    <h3>animated progressbars <button type="button" class="btn btn-primary" id="v-default-animated">start</button></h3>
                    <div class="bs-example vertical v-default-animated">
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-default-animated').click(function() {
                                    $('.v-default-animated .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                    <h3>custom aria range <button type="button" class="btn btn-primary" id="v-default-aria">start</button></h3>
                    <div class="bs-example vertical v-default-aria">
                        <div class="progress vertical wide">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="2" aria-valuemin="1" aria-valuemax="6"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40" aria-valuemin="-40" aria-valuemax="200"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60" aria-valuemax="120"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80" aria-valuemin="30" ></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-default-aria').click(function() {
                                    $('.v-default-aria .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;2&quot; aria-valuemin=&quot;1&quot; aria-valuemax=&quot;6&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot; aria-valuemin=&quot;-40&quot; aria-valuemax=&quot;200&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot; aria-valuemax=&quot;120&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot; aria-valuemin=&quot;30&quot; &gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                    <h3>custom animations <button type="button" class="btn btn-primary" id="v-default-animation">start</button></h3>
                    <div class="bs-example vertical v-default-animation">
                        <div class="progress vertical wide">
                            <div class="bar six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-info six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-success six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-warning six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-danger six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-default-animation').click(function() {
                                    $('.v-default-animation .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>.progress.vertical .bar.six-sec-ease-in-out {
    -webkit-transition: height 6s ease-in-out;
    -moz-transition: height 6s ease-in-out;
    -ms-transition: height 6s ease-in-out;
    -o-transition: height 6s ease-in-out;
    transition: height 6s ease-in-out;
}
</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-info six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-success six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-warning six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-danger six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                </div>
                <div class="bs-docs-section">
                    <div class="page-header">
                        <h1 id="v-bottom">default settings (bottom)</h1>
                    </div>
                    <p class="lead">this is just plain default behavior - bottom aligned.</p>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>Progressbar.defaults = {
    transition_delay: 300,
    refresh_speed: 50,
    display_text: 'none',
    use_percentage: true,
    update: $.noop,
    done: $.noop,
    fail: $.noop
};</code>
                        </pre>
                    </div>
                    <h3>basic progressbar <button type="button" class="btn btn-primary" id="v-bottom-basic">start</button></h3>
                    <div class="bs-example vertical bottom v-bottom-basic">
                        <div class="progress vertical bottom wide">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-bottom-basic').click(function() {
                                    $('.v-bottom-basic .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical bottom&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;75&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                    <h3>themed progressbars <button type="button" class="btn btn-primary" id="v-bottom-themed">start</button></h3>
                    <div class="bs-example vertical bottom v-bottom-themed">
                        <div class="progress vertical bottom wide">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress vertical bottom wide">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress vertical bottom wide">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress vertical bottom wide">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-bottom-themed').click(function() {
                                    $('.v-bottom-themed .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical bottom&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical bottom&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical bottom&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical bottom&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                    <h3>striped progressbars <button type="button" class="btn btn-primary" id="v-bottom-striped">start</button></h3>
                    <div class="bs-example vertical bottom v-bottom-striped">
                        <div class="progress progress-striped vertical bottom wide">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress progress-striped vertical bottom wide">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress progress-striped vertical bottom wide">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress progress-striped vertical bottom wide">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress progress-striped vertical bottom wide">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-bottom-striped').click(function() {
                                    $('.v-bottom-striped .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped vertical bottom&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical bottom&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical bottom&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical bottom&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical bottom&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                    <h3>animated progressbars <button type="button" class="btn btn-primary" id="v-bottom-animated">start</button></h3>
                    <div class="bs-example vertical bottom v-bottom-animated">
                        <div class="progress progress-striped vertical bottom wide active">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress progress-striped vertical bottom wide active">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress progress-striped vertical bottom wide active">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress progress-striped vertical bottom wide active">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress progress-striped vertical bottom wide active">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-bottom-animated').click(function() {
                                    $('.v-bottom-animated .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped vertical bottom wide active&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical bottom wide active&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical bottom wide active&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical bottom wide active&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical bottom wide active&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                    <h3>custom aria range <button type="button" class="btn btn-primary" id="v-bottom-aria">start</button></h3>
                    <div class="bs-example vertical bottom v-bottom-aria">
                        <div class="progress vertical bottom wide">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="2" aria-valuemin="1" aria-valuemax="6"></div>
                        </div>
                        <div class="progress vertical bottom wide">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40" aria-valuemin="-40" aria-valuemax="200"></div>
                        </div>
                        <div class="progress vertical bottom wide">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60" aria-valuemax="120"></div>
                        </div>
                        <div class="progress vertical bottom wide">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80" aria-valuemin="30" ></div>
                        </div>
                        <div class="progress vertical bottom wide">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-bottom-aria').click(function() {
                                    $('.v-bottom-aria .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical bottom&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;2&quot; aria-valuemin=&quot;1&quot; aria-valuemax=&quot;6&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical bottom&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot; aria-valuemin=&quot;-40&quot; aria-valuemax=&quot;200&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical bottom&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot; aria-valuemax=&quot;120&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical bottom&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot; aria-valuemin=&quot;30&quot; &gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical bottom&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                    <h3>custom animations <button type="button" class="btn btn-primary" id="v-bottom-animation">start</button></h3>
                    <div class="bs-example vertical bottom v-bottom-animation">
                        <div class="progress vertical bottom wide">
                            <div class="bar six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress vertical bottom wide">
                            <div class="bar bar-info six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress vertical bottom wide">
                            <div class="bar bar-success six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress vertical bottom wide">
                            <div class="bar bar-warning six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress vertical bottom wide">
                            <div class="bar bar-danger six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-bottom-animation').click(function() {
                                    $('.v-bottom-animation .bar').progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>.progress.vertical .bar.six-sec-ease-in-out {
    -webkit-transition: height 6s ease-in-out;
    -moz-transition: height 6s ease-in-out;
    -ms-transition: height 6s ease-in-out;
    -o-transition: height 6s ease-in-out;
    transition: height 6s ease-in-out;
}
</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical bottom&quot;&gt;
    &lt;div class=&quot;bar six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical bottom&quot;&gt;
    &lt;div class=&quot;bar bar-info six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical bottom&quot;&gt;
    &lt;div class=&quot;bar bar-success six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical bottom&quot;&gt;
    &lt;div class=&quot;bar bar-warning six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical bottom&quot;&gt;
    &lt;div class=&quot;bar bar-danger six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar();</code>
                        </pre>
                    </div>
                </div>
                <div class="bs-docs-section">
                    <div class="page-header">
                        <h1 id="v-fill">filled text</h1>
                    </div>
                    <p class="lead">the following examples are showing how to display text on the filled bar.</p>
                    <h3>basic progressbar <button type="button" class="btn btn-primary" id="v-fill-basic">start</button></h3>
                    <div class="bs-example vertical v-fill-basic">
                        <div class="progress vertical wide">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-fill-basic').click(function() {
                                    $('.v-fill-basic .bar').progressbar({display_text: 'fill'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;75&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'fill'});</code>
                        </pre>
                    </div>
                    <h3>themed progressbars <button type="button" class="btn btn-primary" id="v-fill-themed">start</button></h3>
                    <div class="bs-example vertical v-fill-themed">
                        <div class="progress vertical wide">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-fill-themed').click(function() {
                                    $('.v-fill-themed .bar').progressbar({display_text: 'fill'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'fill'});</code>
                        </pre>
                    </div>
                    <h3>striped progressbars <button type="button" class="btn btn-primary" id="v-fill-striped">start</button></h3>
                    <div class="bs-example vertical v-fill-striped">
                        <div class="progress progress-striped vertical wide">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress progress-striped vertical wide">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress progress-striped vertical wide">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress progress-striped vertical wide">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress progress-striped vertical wide">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-fill-striped').click(function() {
                                    $('.v-fill-striped .bar').progressbar({display_text: 'fill'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'fill'});</code>
                        </pre>
                    </div>
                    <h3>animated progressbars <button type="button" class="btn btn-primary" id="v-fill-animated">start</button></h3>
                    <div class="bs-example vertical v-fill-animated">
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-fill-animated').click(function() {
                                    $('.v-fill-animated .bar').progressbar({display_text: 'fill'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'fill'});</code>
                        </pre>
                    </div>
                    <h3>custom aria range <button type="button" class="btn btn-primary" id="v-fill-aria">start</button></h3>
                    <div class="bs-example vertical v-fill-aria">
                        <div class="progress vertical wide">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="2" aria-valuemin="1" aria-valuemax="6"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40" aria-valuemin="-40" aria-valuemax="200"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60" aria-valuemax="120"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80" aria-valuemin="30" ></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-fill-aria').click(function() {
                                    $('.v-fill-aria .bar').progressbar({display_text: 'fill'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;2&quot; aria-valuemin=&quot;1&quot; aria-valuemax=&quot;6&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot; aria-valuemin=&quot;-40&quot; aria-valuemax=&quot;200&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot; aria-valuemax=&quot;120&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot; aria-valuemin=&quot;30&quot; &gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'fill'});</code>
                        </pre>
                    </div>
                    <h3>custom animations <button type="button" class="btn btn-primary" id="v-fill-animation">start</button></h3>
                    <div class="bs-example vertical v-fill-animation">
                        <div class="progress vertical wide">
                            <div class="bar six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-info six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-success six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-warning six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-danger six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-fill-animation').click(function() {
                                    $('.v-fill-animation .bar').progressbar({display_text: 'fill'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>.progress.vertical .bar.six-sec-ease-in-out {
    -webkit-transition: height 6s ease-in-out;
    -moz-transition: height 6s ease-in-out;
    -ms-transition: height 6s ease-in-out;
    -o-transition: height 6s ease-in-out;
    transition: height 6s ease-in-out;
}
</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-info six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-success six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-warning six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-danger six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'fill'});</code>
                        </pre>
                    </div>
                </div>
                <div class="bs-docs-section">
                    <div class="page-header">
                        <h1 id="v-fill-nonpercentage">filled text (nonpercentage)</h1>
                    </div>
                    <p class="lead">the following examples are showing how to display nonpercentage text on the filled bar.</p>
                    <h3>basic progressbar <button type="button" class="btn btn-primary" id="v-fill-nonpercentage-basic">start</button></h3>
                    <div class="bs-example vertical v-fill-nonpercentage-basic">
                        <div class="progress vertical wide">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-fill-nonpercentage-basic').click(function() {
                                    $('.v-fill-nonpercentage-basic .bar').progressbar({display_text: 'fill', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;75&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'fill',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                    <h3>themed progressbars <button type="button" class="btn btn-primary" id="v-fill-nonpercentage-themed">start</button></h3>
                    <div class="bs-example vertical v-fill-nonpercentage-themed">
                        <div class="progress vertical wide">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-fill-nonpercentage-themed').click(function() {
                                    $('.v-fill-nonpercentage-themed .bar').progressbar({display_text: 'fill', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'fill',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                    <h3>striped progressbars <button type="button" class="btn btn-primary" id="v-fill-nonpercentage-striped">start</button></h3>
                    <div class="bs-example vertical v-fill-nonpercentage-striped">
                        <div class="progress progress-striped vertical wide">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress progress-striped vertical wide">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress progress-striped vertical wide">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress progress-striped vertical wide">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress progress-striped vertical wide">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-fill-nonpercentage-striped').click(function() {
                                    $('.v-fill-nonpercentage-striped .bar').progressbar({display_text: 'fill', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'fill',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                    <h3>animated progressbars <button type="button" class="btn btn-primary" id="v-fill-nonpercentage-animated">start</button></h3>
                    <div class="bs-example vertical v-fill-nonpercentage-animated">
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-fill-nonpercentage-animated').click(function() {
                                    $('.v-fill-nonpercentage-animated .bar').progressbar({display_text: 'fill', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'fill',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                    <h3>custom aria range <button type="button" class="btn btn-primary" id="v-fill-nonpercentage-aria">start</button></h3>
                    <div class="bs-example vertical v-fill-nonpercentage-aria">
                        <div class="progress vertical wide">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="2" aria-valuemin="1" aria-valuemax="6"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40" aria-valuemin="-40" aria-valuemax="200"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60" aria-valuemax="120"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80" aria-valuemin="30" ></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-fill-nonpercentage-aria').click(function() {
                                    $('.v-fill-nonpercentage-aria .bar').progressbar({display_text: 'fill', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;2&quot; aria-valuemin=&quot;1&quot; aria-valuemax=&quot;6&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot; aria-valuemin=&quot;-40&quot; aria-valuemax=&quot;200&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot; aria-valuemax=&quot;120&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot; aria-valuemin=&quot;30&quot; &gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'fill',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                    <h3>custom animations <button type="button" class="btn btn-primary" id="v-fill-nonpercentage-animation">start</button></h3>
                    <div class="bs-example vertical v-fill-nonpercentage-animation">
                        <div class="progress vertical wide">
                            <div class="bar six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-info six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-success six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-warning six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-danger six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-fill-nonpercentage-animation').click(function() {
                                    $('.v-fill-nonpercentage-animation .bar').progressbar({display_text: 'fill', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>.progress.vertical .bar.six-sec-ease-in-out {
    -webkit-transition: height 6s ease-in-out;
    -moz-transition: height 6s ease-in-out;
    -ms-transition: height 6s ease-in-out;
    -o-transition: height 6s ease-in-out;
    transition: height 6s ease-in-out;
}
</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-info six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-success six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-warning six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-danger six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'fill',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                </div>
                <div class="bs-docs-section">
                    <div class="page-header">
                        <h1 id="v-center">centered text</h1>
                    </div>
                    <p class="lead">the following examples are showing how to display centered text on the bar.</p>
                    <h3>basic progressbar <button type="button" class="btn btn-primary" id="v-center-basic">start</button></h3>
                    <div class="bs-example vertical v-center-basic">
                        <div class="progress vertical wide">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-center-basic').click(function() {
                                    $('.v-center-basic .bar').progressbar({display_text: 'center'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;75&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'center'});</code>
                        </pre>
                    </div>
                    <h3>themed progressbars <button type="button" class="btn btn-primary" id="v-center-themed">start</button></h3>
                    <div class="bs-example vertical v-center-themed">
                        <div class="progress vertical wide">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="25"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="49"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="51"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-center-themed').click(function() {
                                    $('.v-center-themed .bar').progressbar({display_text: 'center'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'center'});</code>
                        </pre>
                    </div>
                    <h3>striped progressbars <button type="button" class="btn btn-primary" id="v-center-striped">start</button></h3>
                    <div class="bs-example vertical v-center-striped">
                        <div class="progress progress-striped vertical wide">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="25"></div>
                        </div>
                        <div class="progress progress-striped vertical wide">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="49"></div>
                        </div>
                        <div class="progress progress-striped vertical wide">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="50"></div>
                        </div>
                        <div class="progress progress-striped vertical wide">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="51"></div>
                        </div>
                        <div class="progress progress-striped vertical wide">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-center-striped').click(function() {
                                    $('.v-center-striped .bar').progressbar({display_text: 'center'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'center'});</code>
                        </pre>
                    </div>
                    <h3>animated progressbars <button type="button" class="btn btn-primary" id="v-center-animated">start</button></h3>
                    <div class="bs-example vertical v-center-animated">
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="25"></div>
                        </div>
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="49"></div>
                        </div>
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="50"></div>
                        </div>
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="51"></div>
                        </div>
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-center-animated').click(function() {
                                    $('.v-center-animated .bar').progressbar({display_text: 'center'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'center'});</code>
                        </pre>
                    </div>
                    <h3>custom aria range <button type="button" class="btn btn-primary" id="v-center-aria">start</button></h3>
                    <div class="bs-example vertical v-center-aria">
                        <div class="progress vertical wide">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="2" aria-valuemin="1" aria-valuemax="6"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40" aria-valuemin="-40" aria-valuemax="200"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60" aria-valuemax="120"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80" aria-valuemin="30" ></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-center-aria').click(function() {
                                    $('.v-center-aria .bar').progressbar({display_text: 'center'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;2&quot; aria-valuemin=&quot;1&quot; aria-valuemax=&quot;6&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot; aria-valuemin=&quot;-40&quot; aria-valuemax=&quot;200&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot; aria-valuemax=&quot;120&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot; aria-valuemin=&quot;30&quot; &gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'center'});</code>
                        </pre>
                    </div>
                    <h3>custom animations <button type="button" class="btn btn-primary" id="v-center-animation">start</button></h3>
                    <div class="bs-example vertical v-center-animation">
                        <div class="progress vertical wide">
                            <div class="bar six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-info six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-success six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-warning six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-danger six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-center-animation').click(function() {
                                    $('.v-center-animation .bar').progressbar({display_text: 'center'});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>.progress.vertical .bar.six-sec-ease-in-out {
    -webkit-transition: height 6s ease-in-out;
    -moz-transition: height 6s ease-in-out;
    -ms-transition: height 6s ease-in-out;
    -o-transition: height 6s ease-in-out;
    transition: height 6s ease-in-out;
}
</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-info six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-success six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-warning six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-danger six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({display_text: 'center'});</code>
                        </pre>
                    </div>
                </div>
                <div class="bs-docs-section">
                    <div class="page-header">
                        <h1 id="v-center-nonpercentage">centered text (nonpercentage)</h1>
                    </div>
                    <p class="lead">the following examples are showing how to display nonpercentage centered text on the bar.</p>
                    <h3>basic progressbar <button type="button" class="btn btn-primary" id="v-center-nonpercentage-basic">start</button></h3>
                    <div class="bs-example vertical v-center-nonpercentage-basic">
                        <div class="progress vertical wide">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-center-nonpercentage-basic').click(function() {
                                    $('.v-center-nonpercentage-basic .bar').progressbar({display_text: 'center', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;75&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'center',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                    <h3>themed progressbars <button type="button" class="btn btn-primary" id="v-center-nonpercentage-themed">start</button></h3>
                    <div class="bs-example vertical v-center-nonpercentage-themed">
                        <div class="progress vertical wide">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="25"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="49"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="51"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-center-nonpercentage-themed').click(function() {
                                    $('.v-center-nonpercentage-themed .bar').progressbar({display_text: 'center', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'center',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                    <h3>striped progressbars <button type="button" class="btn btn-primary" id="v-center-nonpercentage-striped">start</button></h3>
                    <div class="bs-example vertical v-center-nonpercentage-striped">
                        <div class="progress progress-striped vertical wide">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="25"></div>
                        </div>
                        <div class="progress progress-striped vertical wide">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="49"></div>
                        </div>
                        <div class="progress progress-striped vertical wide">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="50"></div>
                        </div>
                        <div class="progress progress-striped vertical wide">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="51"></div>
                        </div>
                        <div class="progress progress-striped vertical wide">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-center-nonpercentage-striped').click(function() {
                                    $('.v-center-nonpercentage-striped .bar').progressbar({display_text: 'center', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'center',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                    <h3>animated progressbars <button type="button" class="btn btn-primary" id="v-center-nonpercentage-animated">start</button></h3>
                    <div class="bs-example vertical v-center-nonpercentage-animated">
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="25"></div>
                        </div>
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="49"></div>
                        </div>
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="50"></div>
                        </div>
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="51"></div>
                        </div>
                        <div class="progress progress-striped vertical wide active">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-center-nonpercentage-animated').click(function() {
                                    $('.v-center-nonpercentage-animated .bar').progressbar({display_text: 'center', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress progress-striped vertical wide active&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'center',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                    <h3>custom aria range <button type="button" class="btn btn-primary" id="v-center-nonpercentage-aria">start</button></h3>
                    <div class="bs-example vertical v-center-nonpercentage-aria">
                        <div class="progress vertical wide">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="2" aria-valuemin="1" aria-valuemax="6"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40" aria-valuemin="-40" aria-valuemax="200"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60" aria-valuemax="120"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80" aria-valuemin="30" ></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-center-nonpercentage-aria').click(function() {
                                    $('.v-center-nonpercentage-aria .bar').progressbar({display_text: 'center', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;2&quot; aria-valuemin=&quot;1&quot; aria-valuemax=&quot;6&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot; aria-valuemin=&quot;-40&quot; aria-valuemax=&quot;200&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot; aria-valuemax=&quot;120&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot; aria-valuemin=&quot;30&quot; &gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'center',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                    <h3>custom animations <button type="button" class="btn btn-primary" id="v-center-nonpercentage-animation">start</button></h3>
                    <div class="bs-example vertical v-center-nonpercentage-animation">
                        <div class="progress vertical wide">
                            <div class="bar six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-info six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-success six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-warning six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress vertical wide">
                            <div class="bar bar-danger six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#v-center-nonpercentage-animation').click(function() {
                                    $('.v-center-nonpercentage-animation .bar').progressbar({display_text: 'center', use_percentage: false});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>.progress.vertical .bar.six-sec-ease-in-out {
    -webkit-transition: height 6s ease-in-out;
    -moz-transition: height 6s ease-in-out;
    -ms-transition: height 6s ease-in-out;
    -o-transition: height 6s ease-in-out;
    transition: height 6s ease-in-out;
}
</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-info six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-success six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-warning six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress vertical&quot;&gt;
    &lt;div class=&quot;bar bar-danger six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'center',
    use_percentage: false
});</code>
                        </pre>
                    </div>
                </div>
                <div class="bs-docs-section">
                    <div class="page-header">
                        <h1 id="m-misc">miscellaneous</h1>
                    </div>
                    <p class="lead">all other functionality and settings</p>
                    <h3>delayed progressbars <button type="button" class="btn btn-primary" id="m-delay">start</button></h3>
                    <div class="bs-example m-delay">
                        <div class="progress">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#m-delay').click(function() {
                                    $('.m-delay .bar').progressbar({transition_delay: 3000});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({transition_delay: 3000});</code>
                        </pre>
                    </div>
                    <h3>refresh speed progressbars <button type="button" class="btn btn-primary" id="m-refresh-speed">start</button></h3>
                    <div class="bs-example m-refresh-speed">
                        <div class="progress">
                            <div class="bar six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="25"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-info six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="49"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-success six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="50"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-warning six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="51"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-danger six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="75"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#m-refresh-speed').click(function() {
                                    $('.m-refresh-speed .bar').progressbar({display_text: 'center', use_percentage: false, refresh_speed: 500});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>.progress .bar.six-sec-ease-in-out {
    -webkit-transition: width 6s ease-in-out;
    -moz-transition: width 6s ease-in-out;
    -ms-transition: width 6s ease-in-out;
    -o-transition: width 6s ease-in-out;
    transition: width 6s ease-in-out;
}
</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-info six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-success six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-warning six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-danger six-sec-ease-in-out&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'center',
    use_percentage: false,
    refresh_speed: 500
});</code>
                        </pre>
                    </div>
                    <h3>callbacks <button type="button" class="btn btn-primary" id="m-callback">start</button></h3>
                    <div class="bs-example m-callback">
                        <div class="progress">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <p>update: <span id="m-callback-update"></span></p>
                        <p>done: <span id="m-callback-done"></span></p>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#m-callback').click(function() {
                                    $('.m-callback .bar').progressbar({
                                        update: function(current_percentage) { $('#m-callback-update').html(current_percentage); },
                                        done: function() { $('#m-callback-done').html('yeah! done!'); }
                                    });
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;p&gt;update: &lt;span id=&quot;m-callback-update&quot;&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p&gt;done: &lt;span id=&quot;m-callback-done&quot;&gt;&lt;/span&gt;&lt;/p&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$(document).ready(function() {
    $('#m-callback').click(function() {
        $('.m-callback .bar').progressbar({
            update: function(current_percentage) {
                $('#m-callback-update').html(current_percentage);
            },
            done: function() {
                $('#m-callback-done').html('yeah! done!');
            }
        });
    });
});</code>
                        </pre>
                    </div>
                    <h3>error <button type="button" class="btn btn-primary" id="m-error">start</button></h3>
                    <div class="bs-example m-error">
                        <div class="progress">
                            <div class="bar" role="progressbar"></div>
                        </div>
                        <p>error: <span id="m-callback-error" style="color: red"></span></p>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#m-error').click(function() {
                                    $('.m-error .bar').progressbar({
                                        fail: function(error) { $('#m-callback-error').html(error); }
                                    });
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;p&gt;error: &lt;span id=&quot;m-callback-error&quot; style=&quot;color: red&quot;&gt;&lt;/span&gt;&lt;/p&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$(document).ready(function() {
    $('#m-callback').click(function() {
        $('.m-callback .bar').progressbar({
            update: function(current_percentage) {
                $('#m-callback-update').html(current_percentage);
            },
            done: function() {
                $('#m-callback-done').html('yeah! done!');
            }
        });
    });
});</code>
                        </pre>
                    </div>
                    <h3>custom percentage format <button type="button" class="btn btn-primary" id="m-custom-percentage-format">start</button></h3>
                    <div class="bs-example m-custom-percentage-format">
                        <div class="progress">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#m-custom-percentage-format').click(function() {
                                    $('.m-custom-percentage-format .bar').progressbar({display_text: 'center', percent_format: function(p) {return p + ' percent';}});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'center',
    percent_format: function(p) {return p + ' percent';}
});</code>
                        </pre>
                    </div>
                    <h3>custom amount format <button type="button" class="btn btn-primary" id="m-custom-amount-format">start</button></h3>
                    <div class="bs-example m-custom-amount-format">
                        <div class="progress">
                            <div class="bar" role="progressbar" aria-valuetransitiongoal="20"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-info" role="progressbar" aria-valuetransitiongoal="40"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-success" role="progressbar" aria-valuetransitiongoal="60"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-warning" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-danger" role="progressbar" aria-valuetransitiongoal="100"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#m-custom-amount-format').click(function() {
                                    $('.m-custom-amount-format .bar').progressbar({display_text: 'center', use_percentage: false, amount_format: function(p, t) {return p + ' of ' + t;}});
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;20&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;40&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;60&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;80&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot; role=&quot;progressbar&quot; aria-valuetransitiongoal=&quot;100&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>$('.bar').progressbar({
    display_text: 'center',
    use_percentage: false,
    amount_format: function(p, t) {return p + ' of ' + t;}
});</code>
                        </pre>
                    </div>
                    <h3>multi trigger <button type="button" class="btn btn-primary" id="m-multi-trigger-0">0</button> <button type="button" class="btn btn-primary" id="m-multi-trigger-50">50</button> <button type="button" class="btn btn-primary" id="m-multi-trigger-100">100</button></h3>
                    <div class="bs-example m-multi-trigger">
                        <div class="progress">
                            <div class="bar"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-info"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-success"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-warning"></div>
                        </div>
                        <div class="progress">
                            <div class="bar bar-danger"></div>
                        </div>
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                var $ps = $('.m-multi-trigger .bar');
                                $('#m-multi-trigger-0').click(function() {
                                    $ps.attr('aria-valuetransitiongoal', 0).progressbar();
                                });
                                $('#m-multi-trigger-50').click(function() {
                                    $ps.attr('aria-valuetransitiongoal', 50).progressbar();
                                });
                                $('#m-multi-trigger-100').click(function() {
                                    $ps.attr('aria-valuetransitiongoal', 100).progressbar();
                                });
                            });
                        </script>
                    </div>
                    <div class="highlight">
                        <pre class="prettyprint">
<code>&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-info&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-success&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-warning&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;progress&quot;&gt;
    &lt;div class=&quot;bar bar-danger&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code>
                        </pre><br>
                        <pre class="prettyprint">
<code>var $ps = $('.progress-bar');
$('#m-multi-trigger-0').click(function() {
    $ps.attr('aria-valuetransitiongoal', 0).progressbar();
});
$('#m-multi-trigger-50').click(function() {
    $ps.attr('aria-valuetransitiongoal', 50).progressbar();
});
$('#m-multi-trigger-100').click(function() {
    $ps.attr('aria-valuetransitiongoal', 100).progressbar();
});</code>
                        </pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>