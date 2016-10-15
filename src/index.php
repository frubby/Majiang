<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
		<title></title>
		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
		<link href="//cdn.bootcss.com/jquery-mobile/1.4.5/jquery.mobile.css" rel="stylesheet">
		<script src="http://apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="http://apps.bdimg.com/libs/jquerymobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

		<style>
			.img_mj {
				height: 70px;
			}
			
			.img_mj_s {
				height: 28px;
				border: 1px solid;
				border-color: #FFFFFF;
			}
			
			.img_mj_s_select {
				border: 2px solid;
				border-color: #22FF22;
			}
		</style>

	</head>

	<body>

		<div>
			<img id="pai_1" src="img/11.png" class="img_mj" />
			<img id="pai_2" src="img/12.png" class="img_mj" />
			<img id="pai_3" src="img/13.png" class="img_mj" />
			<img id="pai_4" src="img/12.png" class="img_mj" />
			<img id="pai_5" src="img/13.png" class="img_mj" />

			<img id="pai_6" src="img/14.png" class="img_mj" />
			<img id="pai_7" src="img/15.png" class="img_mj" />
			<img id="pai_8" src="img/15.png" class="img_mj" />

			<img id="pai_9" src="img/15.png" class="img_mj" />
			<img id="pai_10" src="img/15.png" class="img_mj" />
			<img id="pai_11" src="img/16.png" class="img_mj" />
			<img id="pai_12" src="img/17.png" class="img_mj" />
			<img id="pai_13" src="img/18.png" class="img_mj" />
		</div>
		<a class="ui-btn" id="btn_refresh"> 发牌</a>

		<a class="ui-btn" id="btn_ok">确认</a>
		<div>
			<div style="overflow-x:auto">
				<img src="img/11.png" class="img_mj_s" />
				<img src="img/12.png" class="img_mj_s" />
				<img src="img/13.png" class="img_mj_s" />
				<img src="img/14.png" class="img_mj_s" />
				<img src="img/15.png" class="img_mj_s" />
				<img src="img/16.png" class="img_mj_s" />
				<img src="img/17.png" class="img_mj_s" />
				<img src="img/18.png" class="img_mj_s" />
				<img src="img/19.png" class="img_mj_s" />
			</div>
			<div>
				<img src="img/21.png" class="img_mj_s" />
				<img src="img/22.png" class="img_mj_s" />
				<img src="img/23.png" class="img_mj_s" />
				<img src="img/24.png" class="img_mj_s" />
				<img src="img/25.png" class="img_mj_s" />
				<img src="img/26.png" class="img_mj_s" />
				<img src="img/27.png" class="img_mj_s" />
				<img src="img/28.png" class="img_mj_s" />
				<img src="img/29.png" class="img_mj_s" />
			</div>
			<div>
				<img src="img/31.png" class="img_mj_s" />
				<img src="img/32.png" class="img_mj_s" />
				<img src="img/33.png" class="img_mj_s" />
				<img src="img/34.png" class="img_mj_s" />
				<img src="img/35.png" class="img_mj_s" />

				<img src="img/36.png" class="img_mj_s" />
				<img src="img/37.png" class="img_mj_s" />

				<img src="img/38.png" class="img_mj_s" />
				<img src="img/39.png" class="img_mj_s" />
			</div>
		</div>

	</body>

	<script>
		$(document).ready(function() {
			console.debug("ready");

		});

		$(".img_mj_s").click(function() {
			$(this).toggleClass("img_mj_s_select");
		});

		$("#btn_refresh").click(function() {
			var id = Math.floor(Math.random() * 333) % 10;
			if(id < 6)
				randomMajiang(1);
			else if(id < 8)
				randomMajiang(1);
			else
				randomMajiang(1);

		});

		var current = [];
		var current_rel = [];
		var PAI = [11, 12, 13, 14, 15, 16, 17, 18, 19, 21, 22, 23, 24, 25, 26, 27, 28, 29, 31, 32, 33, 34, 35, 36, 37, 38, 39];

		var current_color = [];

		var randomMajiang = function(level) {
			var offset = Math.floor(Math.random() * 333) % 3 * 9;
			var src_list = [];
			for(var i = 1; i <= level; i++) {
				for(var j = 0; j < 9; j++) {
					var idx = (offset + 9 * (i - 1) + j);
					if(idx >= 27) idx -= 27;
					src_list.push(PAI[idx]);
					src_list.push(PAI[idx]);
					src_list.push(PAI[idx]);
					src_list.push(PAI[idx]);
				}
			}
			console.log(src_list);

			var pai_list = [];
			var pai_map = {};
			//step 1 create 2
			var mod = src_list.length;

			var rd = Math.floor(Math.random() * 333) % mod;

			delFromSrcList(pai_list, src_list, [src_list[rd], src_list[rd]]);
			//step2 create 3
			for(var i = 0; i < 4; i++) {
				var find = findThree(src_list);
				delFromSrcList(pai_list, src_list, find)
			}
			console.log("pai_list");
			console.log(pai_list.sort());
			if(pai_list.length<14)
			{
				console.error(pai_list);
				return;
			}


			var can_hu_idx = Math.floor(Math.random() * 100) % pai_list.length;
			var can_hu = pai_list[can_hu_idx];
			pai_list.splice(can_hu_idx, 1);
			

			//step 3 redraw
			createPic(pai_list);
			//step 4 left list
			var left_list = [];
			for(var i = 0; i < src_list.length; i++) //遍历当前数组
			{
				if(src_list[i] != can_hu && left_list.indexOf(src_list[i]) == -1) {
					left_list.push(src_list[i]);
				}
			}
			//step 5 hu list

			var hu_list = findHuList(pai_list, left_list);
			hu_list.push(can_hu);
			hu_list.sort();
			console.log("hu_list  " +hu_list);
			printPai(hu_list);
		}

		var findThree = function(src_list) {
			var find = [];
			var mod = src_list.length;
			var rd = Math.floor(Math.random() * 100) % mod;
			var rd_pai = src_list[rd];
			var retry = 100;
			while(--retry > 0) {
				var isThree = Math.floor(Math.random() * 100) % 8;
				//let 选择三个一样的
				if(isThree > 3) {
					var idx = src_list.indexOf(rd_pai);
					if(src_list[idx + 1] == rd_pai && src_list[idx + 2] == rd_pai) {
						find.push(rd_pai);
						find.push(rd_pai);
						find.push(rd_pai);
						return find;
					}
				}
				//能与后面连续
				if(src_list.indexOf(rd_pai + 1) > 0 && src_list.indexOf(rd_pai + 2) > 0) {
					find.push(rd_pai);
					find.push(rd_pai + 1);
					find.push(rd_pai + 2);
					return find;
				}
				//能与前后连续
				if(src_list.indexOf(rd_pai - 1) > 0 && src_list.indexOf(rd_pai + 1) > 0) {
					find.push(rd_pai - 1);
					find.push(rd_pai);
					find.push(rd_pai + 1);
					return find;
				}
				//能与前面连续
				if(src_list.indexOf(rd_pai - 2) > 0 && src_list.indexOf(rd_pai - 1) > 0) {
					find.push(rd_pai - 2);
					find.push(rd_pai - 1);
					find.push(rd_pai);
					return find;
				}
				//let 选择三个一样的
				var idx = src_list.indexOf(rd_pai);
				if(src_list[idx + 1] == rd_pai && src_list[idx + 2] == rd_pai) {
					find.push(rd_pai);
					find.push(rd_pai);
					find.push(rd_pai);
					return find;
				}
			}
		}

		var delFromSrcList = function(pai_list, src_list, find_list) {
			$.each(find_list, function(idx, item) {
				if(item > 0) {
					pai_list.push(item);
					src_list.splice(src_list.indexOf(item), 1);
				}
			});

		}

		var createPic = function(pai_list) {
			$.each(pai_list, function(idx, item) {
				$("#pai_" + (idx + 1)).attr("src", "img/" + item + ".png");
			});
		}

		var findHuList = function(pai_list, left_list) {

			var hu_list = [];
			$.each(left_list, function(idx, item) {
				var temp_list = copy_list(pai_list);
				temp_list.push(item);
				temp_list.sort();
				var rel = judge(temp_list);
				if(rel > 0) {
					if(hu_list.indexOf(item) < 0)
						hu_list.push(item);
				}
			});
			return hu_list;

		}

		var judge = function(pai_list) {
			for(var i = 0; i < 13; i++) {
				if(pai_list[i] == pai_list[i + 1]) {
					var temp_pai = pai_list[i];
					var temp_list = copy_list(pai_list);

					temp_list.splice(temp_list.indexOf(temp_pai), 2);

					if( judgeThree(temp_list)>0)
						return 1;
				}
			}
			return 0;
		}

		var judgeThree = function(pai_list) {
			console.log(pai_list);
			var judge_list=[];
			if(pai_list.length%3!=0){
				console.error(pai_list);
				return 0;
			}
			
			if(pai_list!=null&&pai_list.length == 0) {
//				if(pai_list[0] == pai_list[1] == pai_list[2])
//					return 1
//				if(pai_list[0]+2 == pai_list[1]+1 == pai_list[0])
//					return 1
				return 0;
			}
			var first = pai_list[0];
			if(pai_list.indexOf(first + 1) > 0 && pai_list.indexOf(first + 2) > 0) {
				var temp_list = copy_list(pai_list);
				temp_list.splice(temp_list.indexOf(first), 1);
				temp_list.splice(temp_list.indexOf(first + 1), 1);
				temp_list.splice(temp_list.indexOf(first + 2), 1);

				if(judgeThree(temp_list) > 0)
					return 1;
			}

			if(pai_list[1] == first && pai_list[2] == first) {
				var temp_list = copy_list(pai_list);
				temp_list.splice(temp_list.indexOf(first), 3);
				if(judgeThree(temp_list) > 0)
					return 1;
			}
			return 0;
		}

		var printPai = function(list) {
			var pai_names = [];
			$.each(list, function(idx, item) {
				var unit = item / 10;
				var num = item % 10;
				var name = "" + num;
				switch(unit) {
					case 0:
						name += "S";
						break;
					case 1:
						name += "W";
						break;
					case 2:
						name += "T";
						break;
				}
				pai_names.push(name);
			});
			console.log("HUHUHUHUHUHU");
			console.log(pai_names);
		}
		
		var copy_list=function(list){
			var new_list=[];
			$.each(list, function(i,val) {
				if(val!=undefined)
					new_list.push(val);
			});
			return new_list;
		}
	</script>

</html>