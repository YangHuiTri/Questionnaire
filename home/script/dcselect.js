//logon logoff
// bind page action
//change password 
(function(b) {
	function n(c) {
		if(void 0 != c.o) return c.o.refresh(), a;
		var d = b('<div class="dc_select"><div class="dropbox"><span class="text" style="float:none;"></span><span class="down"></span></div><ul class="dc_down_list" id="dc_select_abc"></ul><div style="clear:both;"></div></div>'),
			a = {
				box: d,
				dropbox: d.find(".dropbox"),
				text: d.find(".dropbox .text"),
				down: d.find(".dropbox .down"),
				list: d.find(".dc_down_list"),
				input: c,
				getIndex: function() {
					return this.input.selectedIndex
				},
				first: !0,
				refreshing: !1
			};
		b(c).after(a.box);
		a.input.disabled && d.addClass("disabled");
		a.refresh = function() {
			function d(e) {
				var m = e.index,
					f = b("<li></li>");
				f.html(e.text);
				c.selectedIndex == e.index && (a.text.html(e.text), f.addClass("hover"));
				a.list.append(f);
				f.click(function() {
					a.input.selectedIndex == m ? a.list.stop().slideUp("fast") : (a.input.selectedIndex = m, a.list.find(".hover").removeClass("hover"), b(this).addClass("hover"), a.text.html(f.html()), a.list.stop().slideUp("fast"), b(a.input).change())
				});
				f.addClass("init");
				e = f.clone().css("visibility", "hidden").css("float", "left").appendTo(b(document.body));
				var g = e.width() + h;
				e.remove();
				g > k && (k = g)
			}
			if(!a.refreshing) {
				a.refreshing = !0;
				a.list.empty();
				a.list.height("0").css("overflow", "auto");
				a.list.show();
				var k = 0,
					h = a.down.width() + 30;
				a.down.addClass("icon-down");
				for(var g = b("option", a.input), l = 0; l < g.length; l++) d(g[l]);
				a.list.hide();
				a.list.height("auto");
				a.box.width(k);
				a.list.width(k - 2);
				a.text.width(k - h);
				a.refreshing = !1
			}
		};
		a.dropbox[0].onclick = function() {
			if(!a.input.disabled) {
				b(".dc_down_list").each(function() {
					this != a.list[0] && b(this).stop().hide()
				});
				if(a.first) {
					a.first = !1;
					var c = a.box.offset(),
						d = a.box.height(),
						h = c.top + d,
						c = a.list.height(),
						h = h + c + 20,
						g = b(window).height();
					h > g && (a.list.addClass("up"), a.list.css("margin-top", -(c + d + 1) + "px"))
				}
				a.list.stop().slideToggle(100)
			}
		};
		b(a.input).hide();
		c.o = a;
		a.refresh();
		return a
	}
	b(document.body).click(function(c) {
		b(c.target).hasClass("text") || b(c.target).hasClass("down") || b(".dc_down_list").stop().hide()
	});
	b.fn.dcselect = function() {
		this.each(function(b, d) {
			n(d)
		})
	}
})(jQuery);