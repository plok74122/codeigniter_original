<div class="main">
	<div class="main-navigation">
		<div class="round-border-topright"></div>
				<?php if($this->session->userdata('no')==""):?>
        <h1 class="first">登入資訊</h1>
        <div class="loginform">
          <form method="post" action="<?php echo base_url('clpsg/login_check');?>"> 
            <fieldset>
              <p><label for="username_1" class="top">帳號:</label><br />
                <input type="text" name="username" id="username" tabindex="1" class="field" onkeypress="return webLoginEnter(document.loginfrm.password);" value="" /></p>
    	      <p><label for="password_1" class="top">密碼:</label><br />
                <input type="password" name="password" id="password" tabindex="2" class="field" onkeypress="return webLoginEnter(document.loginfrm.cmdweblogin);" value="" /></p>
    	      <p><input type="submit" value="登入"  /></p>
	        </fieldset>
          </form>
        </div>
        <?php else:?>
        <h1 class="first"><?php echo $this->session->userdata('name');?>！ 您好。</h1>
        <h1 class="first">人數統計</h1>
				<!-- Navigation with grid style -->
				<dl class="nav3-grid">
					<dt><a href="<?php echo base_url('headcount/add_count');?>">輸入參訪人數</a></dt>
					<dt><a href="<?php echo base_url('headcount/list_headcount');?>">統計列表(近30筆)</a></dt>
					<dt><a href="<?php echo base_url('headcount/headcount_statistics_by_date_choos');?>">區段統計查詢</a></dt>
				</dl>
			<h1 class="first">問卷統計</h1>
				<!-- Navigation with grid style -->
				<dl class="nav3-grid">
					<dt><a href="<?php echo base_url('question/list_need_question');?>">問卷列表</a></dt>
					<dt><a href="<?php echo base_url('question/query_question_by_headcount_list');?>">問卷統計(梯次)</a></dt>
					<dt><a href="<?php echo base_url('question/question_statistics_by_date_choose');?>">問卷統計(時間)</a></dt>
				</dl>
			<h1><a href="<?php echo base_url('clpsg/logut');?>">登出</a></h1>
        <?php endif;?>
	</div><!--結尾在main_content.php-->