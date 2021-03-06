! function(t) {
    t.fn.djSlider = function(e) {
        var i = t.extend({
                navigationSupport: !0,
                slideTime: 4e3,
                speed: 500,
                autoSlide_outAnimation: "fade",
                autoSlide_inAnimation: "fade",
                swipeRight_outAnimation: "swipeRight",
                swipeRight_inAnimation: "swipeRight",
                swipeLeft_outAnimation: "swipeLeft",
                swipeLeft_inAnimation: "swipeLeft",
                nextBtn_outAnimation: "fade",
                nextBtn_inAnimation: "fade",
                prevBtn_outAnimation: "fade",
                prevBtn_inAnimation: "fade",
                nextItemCaption_outAnimation: "fade",
                nextItemCaption_inAnimation: "fade",
                prevItemCaption_outAnimation: "fade",
                prevItemCaption_inAnimation: "fade",
                captionSupport: !0,
                autoSlide: !0,
                pauseOnHover: !1,
                touchSupport: !0
            }, e),
            n = this,
            s = n.find("ul").children(),
            o = s.length,
            a = 0;
        t(document).ready(function() {
            if (i.navigationSupport) {
                var e = n.height() / 2 - 19,
                    r = t("<div>").addClass("next").css({
                        top: e
                    }).html(t("<div>").addClass("toRight")),
                    u = t("<div>").addClass("prev").css({
                        top: e
                    }).html(t("<div>").addClass("toLeft"));
                n.append(r, u), n.hover(function() {
                    r.animate({
                        opacity: 1
                    }, i.speed), u.animate({
                        opacity: 1
                    }, i.speed)
                }, function() {
                    r.animate({
                        opacity: 0
                    }, i.speed), u.animate({
                        opacity: 0
                    }, i.speed)
                }), r.click(function() {
                    v(a + 1, i.nextBtn_outAnimation, i.nextBtn_inAnimation)
                }), u.click(function() {
                    v(a - 1, i.prevBtn_outAnimation, i.prevBtn_inAnimation)
                })
            }
            if (i.captionSupport) {
                for (var h = n.width() / o, l = t("<div>").addClass("sliderCaption"), c = t("<ul>").addClass("captionList"), d = 0; d < o; d++) c.append(t("<li>").addClass("captionItem").css({
                    width: h
                }).html(t(s[d]).find("a").attr("title")));
                l.append(c), n.append(l), n.find("ul.captionList li:first").addClass("activeItem"), n.find("ul.captionList li").click(function() {
                    var e = n.find("ul.captionList li.activeItem").index(),
                        s = t(this).index();
                    s != a && (s > e ? v(s, i.nextItemCaption_outAnimation, i.nextItemCaption_inAnimation) : v(s, i.prevItemCaption_outAnimation, i.prevItemCaption_inAnimation))
                }, function() {
                    var e = t(this).index();
                    e != a && v(e, i.prevItemCaption_outAnimation, i.prevItemCaption_inAnimation)
                })
            }
            if (i.autoSlide) var p = setInterval(f, i.slideTime);

            function f() {
                i.autoSlide && v(a + 1, i.autoSlide_outAnimation, i.autoSlide_inAnimation)
            }

            function v(e, r, u) {
                ! function(e) {
                    var o = t(s[a]);
                    switch (e) {
                        case "swipeLeft":
                            o.animate({
                                left: -1 * n.width()
                            }, i.speed, function() {
                                o.css({
                                    left: 0,
                                    display: "none"
                                })
                            });
                            break;
                        case "swipeRight":
                            o.animate({
                                left: n.width()
                            }, i.speed, function() {
                                o.css({
                                    left: 0,
                                    display: "none"
                                })
                            });
                            break;
                        case "fade":
                        default:
                            o.fadeOut(i.speed)
                    }
                }(r), a = (e + o) % o,
                    function(e) {
                        var o = t(s[a]);
                        switch (e) {
                            case "swipeLeft":
                                o.css({
                                    left: n.width(),
                                    display: "block"
                                }), o.animate({
                                    left: 0
                                }, i.speed);
                                break;
                            case "swipeRight":
                                o.css({
                                    left: -1 * n.width(),
                                    display: "block"
                                }), o.animate({
                                    left: 0
                                }, i.speed);
                                break;
                            case "fade":
                            default:
                                o.fadeIn(i.speed)
                        }
                    }(u), n.find("ul.captionList li").removeClass("activeItem"), n.find("ul.captionList li:eq(" + a + ")").addClass("activeItem")
            }
            i.pauseOnHover && (s.hover(function() {
                clearInterval(p)
            }, function() {
                p = setInterval(f, i.slideTime)
            }), n.find("ul.captionList li").hover(function() {
                clearInterval(p), p = setInterval(f, i.slideTime)
            }), n.find("div.next,div.prev").hover(function() {
                clearInterval(p), p = setInterval(f, i.slideTime)
            }, function() {
                clearInterval(p), p = setInterval(f, i.slideTime)
            }), n.find("div.next,div.prev").click(function() {
                clearInterval(p), p = setInterval(f, i.slideTime)
            })), i.touchSupport && t.fn.swipe && (s.on("dragstart", function(t) {
                t.preventDefault()
            }), s.swipeleft(function() {
                v(a + 1, i.swipeLeft_outAnimation, i.swipeLeft_inAnimation)
            }), s.swiperight(function() {
                v(a - 1, i.swipeRight_outAnimation, i.swipeRight_inAnimation)
            }))
        })
    }
}(jQuery), jQuery.easing.jswing = jQuery.easing.swing, jQuery.extend(jQuery.easing, {
        def: "easeOutQuad",
        swing: function(t, e, i, n, s) {
            return jQuery.easing[jQuery.easing.def](t, e, i, n, s)
        },
        easeInQuad: function(t, e, i, n, s) {
            return n * (e /= s) * e + i
        },
        easeOutQuad: function(t, e, i, n, s) {
            return -n * (e /= s) * (e - 2) + i
        },
        easeInOutQuad: function(t, e, i, n, s) {
            return (e /= s / 2) < 1 ? n / 2 * e * e + i : -n / 2 * (--e * (e - 2) - 1) + i
        },
        easeInCubic: function(t, e, i, n, s) {
            return n * (e /= s) * e * e + i
        },
        easeOutCubic: function(t, e, i, n, s) {
            return n * ((e = e / s - 1) * e * e + 1) + i
        },
        easeInOutCubic: function(t, e, i, n, s) {
            return (e /= s / 2) < 1 ? n / 2 * e * e * e + i : n / 2 * ((e -= 2) * e * e + 2) + i
        },
        easeInQuart: function(t, e, i, n, s) {
            return n * (e /= s) * e * e * e + i
        },
        easeOutQuart: function(t, e, i, n, s) {
            return -n * ((e = e / s - 1) * e * e * e - 1) + i
        },
        easeInOutQuart: function(t, e, i, n, s) {
            return (e /= s / 2) < 1 ? n / 2 * e * e * e * e + i : -n / 2 * ((e -= 2) * e * e * e - 2) + i
        },
        easeInQuint: function(t, e, i, n, s) {
            return n * (e /= s) * e * e * e * e + i
        },
        easeOutQuint: function(t, e, i, n, s) {
            return n * ((e = e / s - 1) * e * e * e * e + 1) + i
        },
        easeInOutQuint: function(t, e, i, n, s) {
            return (e /= s / 2) < 1 ? n / 2 * e * e * e * e * e + i : n / 2 * ((e -= 2) * e * e * e * e + 2) + i
        },
        easeInSine: function(t, e, i, n, s) {
            return -n * Math.cos(e / s * (Math.PI / 2)) + n + i
        },
        easeOutSine: function(t, e, i, n, s) {
            return n * Math.sin(e / s * (Math.PI / 2)) + i
        },
        easeInOutSine: function(t, e, i, n, s) {
            return -n / 2 * (Math.cos(Math.PI * e / s) - 1) + i
        },
        easeInExpo: function(t, e, i, n, s) {
            return 0 == e ? i : n * Math.pow(2, 10 * (e / s - 1)) + i
        },
        easeOutExpo: function(t, e, i, n, s) {
            return e == s ? i + n : n * (1 - Math.pow(2, -10 * e / s)) + i
        },
        easeInOutExpo: function(t, e, i, n, s) {
            return 0 == e ? i : e == s ? i + n : (e /= s / 2) < 1 ? n / 2 * Math.pow(2, 10 * (e - 1)) + i : n / 2 * (2 - Math.pow(2, -10 * --e)) + i
        },
        easeInCirc: function(t, e, i, n, s) {
            return -n * (Math.sqrt(1 - (e /= s) * e) - 1) + i
        },
        easeOutCirc: function(t, e, i, n, s) {
            return n * Math.sqrt(1 - (e = e / s - 1) * e) + i
        },
        easeInOutCirc: function(t, e, i, n, s) {
            return (e /= s / 2) < 1 ? -n / 2 * (Math.sqrt(1 - e * e) - 1) + i : n / 2 * (Math.sqrt(1 - (e -= 2) * e) + 1) + i
        },
        easeInElastic: function(t, e, i, n, s) {
            var o = 1.70158,
                a = 0,
                r = n;
            if (0 == e) return i;
            if (1 == (e /= s)) return i + n;
            if (a || (a = .3 * s), r < Math.abs(n)) {
                r = n;
                o = a / 4
            } else o = a / (2 * Math.PI) * Math.asin(n / r);
            return -r * Math.pow(2, 10 * (e -= 1)) * Math.sin((e * s - o) * (2 * Math.PI) / a) + i
        },
        easeOutElastic: function(t, e, i, n, s) {
            var o = 1.70158,
                a = 0,
                r = n;
            if (0 == e) return i;
            if (1 == (e /= s)) return i + n;
            if (a || (a = .3 * s), r < Math.abs(n)) {
                r = n;
                o = a / 4
            } else o = a / (2 * Math.PI) * Math.asin(n / r);
            return r * Math.pow(2, -10 * e) * Math.sin((e * s - o) * (2 * Math.PI) / a) + n + i
        },
        easeInOutElastic: function(t, e, i, n, s) {
            var o = 1.70158,
                a = 0,
                r = n;
            if (0 == e) return i;
            if (2 == (e /= s / 2)) return i + n;
            if (a || (a = s * (.3 * 1.5)), r < Math.abs(n)) {
                r = n;
                o = a / 4
            } else o = a / (2 * Math.PI) * Math.asin(n / r);
            return e < 1 ? r * Math.pow(2, 10 * (e -= 1)) * Math.sin((e * s - o) * (2 * Math.PI) / a) * -.5 + i : r * Math.pow(2, -10 * (e -= 1)) * Math.sin((e * s - o) * (2 * Math.PI) / a) * .5 + n + i
        },
        easeInBack: function(t, e, i, n, s, o) {
            return void 0 == o && (o = 1.70158), n * (e /= s) * e * ((o + 1) * e - o) + i
        },
        easeOutBack: function(t, e, i, n, s, o) {
            return void 0 == o && (o = 1.70158), n * ((e = e / s - 1) * e * ((o + 1) * e + o) + 1) + i
        },
        easeInOutBack: function(t, e, i, n, s, o) {
            return void 0 == o && (o = 1.70158), (e /= s / 2) < 1 ? n / 2 * (e * e * ((1 + (o *= 1.525)) * e - o)) + i : n / 2 * ((e -= 2) * e * ((1 + (o *= 1.525)) * e + o) + 2) + i
        },
        easeInBounce: function(t, e, i, n, s) {
            return n - jQuery.easing.easeOutBounce(t, s - e, 0, n, s) + i
        },
        easeOutBounce: function(t, e, i, n, s) {
            return (e /= s) < 1 / 2.75 ? n * (7.5625 * e * e) + i : e < 2 / 2.75 ? n * (7.5625 * (e -= 1.5 / 2.75) * e + .75) + i : e < 2.5 / 2.75 ? n * (7.5625 * (e -= 2.25 / 2.75) * e + .9375) + i : n * (7.5625 * (e -= 2.625 / 2.75) * e + .984375) + i
        },
        easeInOutBounce: function(t, e, i, n, s) {
            return e < s / 2 ? .5 * jQuery.easing.easeInBounce(t, 2 * e, 0, n, s) + i : .5 * jQuery.easing.easeOutBounce(t, 2 * e - s, 0, n, s) + .5 * n + i
        }
    }),
    function(t) {
        var e = ["DOMMouseScroll", "mousewheel"];
        if (t.event.fixHooks)
            for (var i = e.length; i;) t.event.fixHooks[e[--i]] = t.event.mouseHooks;

        function n(e) {
            var i = e || window.event,
                n = [].slice.call(arguments, 1),
                s = 0,
                o = 0,
                a = 0;
            return (e = t.event.fix(i)).type = "mousewheel", i.wheelDelta && (s = i.wheelDelta / 120), i.detail && (s = -i.detail / 3), a = s, void 0 !== i.axis && i.axis === i.HORIZONTAL_AXIS && (a = 0, o = -1 * s), void 0 !== i.wheelDeltaY && (a = i.wheelDeltaY / 120), void 0 !== i.wheelDeltaX && (o = -1 * i.wheelDeltaX / 120), n.unshift(e, s, o, a), (t.event.dispatch || t.event.handle).apply(this, n)
        }
        t.event.special.mousewheel = {
            setup: function() {
                if (this.addEventListener)
                    for (var t = e.length; t;) this.addEventListener(e[--t], n, !1);
                else this.onmousewheel = n
            },
            teardown: function() {
                if (this.removeEventListener)
                    for (var t = e.length; t;) this.removeEventListener(e[--t], n, !1);
                else this.onmousewheel = null
            }
        }, t.fn.extend({
            mousewheel: function(t) {
                return t ? this.bind("mousewheel", t) : this.trigger("mousewheel")
            },
            unmousewheel: function(t) {
                return this.unbind("mousewheel", t)
            }
        })
    }(jQuery),
    function($) {
        $.fn.lofJSidernews = function(t) {
            return this.each(function() {
                new $.lofSidernews(this, t)
            })
        }, $.lofSidernews = function(t, e) {
            this.settings = {
                direction: "",
                mainItemSelector: "li",
                navInnerSelector: "ul",
                navSelector: "li",
                navigatorEvent: "click",
                wapperSelector: ".lofslidersmain",
                interval: 5e3,
                auto: !1,
                maxItemDisplay: 3,
                startItem: 0,
                navPosition: "vertical",
                navigatorHeight: 500,
                navigatorWidth: 310,
                duration: 600,
                mobile: !1,
                navItemsSelector: ".navigator-wrap-inner li",
                navOuterSelector: ".navigator-wrapper",
                isPreloaded: !0,
                easing: "easeInOutQuad",
                onPlaySlider: function(t, e) {},
                onComplete: function(t, e) {}
            }, $.extend(this.settings, e || {}), this.nextNo = null, this.previousNo = null, this.maxWidth = this.settings.mainWidth || 684, this.wrapper = $(t).find(this.settings.wapperSelector);
            var i = $('<div class="sliders-wrapper"></div>').width(this.maxWidth);
            if (this.wrapper.wrap(i), this.slides = this.wrapper.find(this.settings.mainItemSelector), this.wrapper.length && this.slides.length) {
                this.settings.maxItemDisplay > this.slides.length && (this.settings.maxItemDisplay = this.slides.length), this.currentNo = isNaN(this.settings.startItem) || this.settings.startItem > this.slides.length ? 0 : this.settings.startItem, this.navigatorOuter = $(t).find(this.settings.navOuterSelector), this.navigatorItems = $(t).find(this.settings.navItemsSelector), this.navigatorInner = this.navigatorOuter.find(this.settings.navInnerSelector), null != this.settings.navigatorHeight && null != this.settings.navigatorWidth || (this.settings.navigatorHeight = this.navigatorItems.eq(0).outerWidth(!0), this.settings.navigatorWidth = this.navigatorItems.eq(0).outerHeight(!0)), "horizontal" == this.settings.navPosition ? (this.navigatorInner.width(this.slides.length * this.settings.navigatorWidth), this.navigatorOuter.width(this.settings.maxItemDisplay * this.settings.navigatorWidth), this.navigatorOuter.height(this.settings.navigatorHeight)) : (this.navigatorInner.height(this.slides.length * this.settings.navigatorHeight), this.navigatorOuter.height(this.settings.maxItemDisplay * this.settings.navigatorHeight), this.navigatorOuter.width(this.settings.navigatorWidth)), this.slides.width(this.settings.mainWidth), this.navigratorStep = this.__getPositionMode(this.settings.navPosition), this.directionMode = this.__getDirectionMode(), "opacity" == this.settings.direction ? (this.wrapper.addClass("lof-opacity"), $(this.slides).css({
                    opacity: 0,
                    "z-index": 1
                }).eq(this.currentNo).css({
                    opacity: 1,
                    "z-index": 3
                })) : this.wrapper.css({
                    left: "-" + this.currentNo * this.maxSize + "px",
                    width: this.maxWidth * this.slides.length
                }), this.settings.isPreloaded ? this.preLoadImage(this.onComplete) : this.onComplete(), $buttonControl = $(".button-control", t), this.settings.auto ? $buttonControl.addClass("action-stop") : $buttonControl.addClass("action-start");
                var n = this;
                $(t).hover(function() {
                    n.stop(), $buttonControl.addClass("action-start").removeClass("action-stop").addClass("hover-stop")
                }, function() {
                    $buttonControl.hasClass("hover-stop") && n.settings.auto && ($buttonControl.removeClass("action-start").removeClass("hover-stop").addClass("action-stop"), n.play(n.settings.interval, "next", !0))
                }), $buttonControl.click(function() {
                    $buttonControl.hasClass("action-start") ? (n.settings.auto = !0, n.play(n.settings.interval, "next", !0), $buttonControl.removeClass("action-start").addClass("action-stop")) : (n.settings.auto = !1, n.stop(), $buttonControl.addClass("action-start").removeClass("action-stop"))
                }), n.settings.mobile && n.slides.each(function(t, e) {
                    $(e).swipe({
                        swipeLeft: function(t, e, i, s, o) {
                            n.next(!0)
                        },
                        swipeRight: function(t, e, i, s, o) {
                            n.previous(!0)
                        },
                        threshold: 0
                    })
                })
            }
        }, $.lofSidernews.fn = $.lofSidernews.prototype, $.lofSidernews.fn.extend = $.lofSidernews.extend = $.extend, $.lofSidernews.fn.extend({
            startUp: function(t, e) {
                return seft = this, this.navigatorItems.each(function(t, e) {
                    $(e).bind(seft.settings.navigatorEvent, function() {
                        seft.jumping(t, !0), seft.setNavActive(t, e)
                    }), $(e).css({
                        height: seft.settings.navigatorHeight,
                        width: seft.settings.navigatorWidth
                    })
                }), this.registerWheelHandler(this.navigatorOuter, this), this.setNavActive(this.currentNo), this.settings.onComplete(this.slides.eq(this.currentNo), this.currentNo), this.settings.buttons && "object" == typeof this.settings.buttons && this.registerButtonsControl("click", this.settings.buttons, this), this.settings.auto && this.play(this.settings.interval, "next", !0), this
            },
            onComplete: function() {
                setTimeout(function() {
                    $(".preloader").fadeOut(900, function() {
                        $(".preloader").remove()
                    })
                }, 400), this.startUp()
            },
            preLoadImage: function(t) {
                var e = this,
                    i = this.wrapper.find("img"),
                    n = 0;
                i.each(function(t, s) {
                    s.complete ? ++n >= i.length && e.onComplete() : (s.onload = function() {
                        ++n >= i.length && e.onComplete()
                    }, s.onerror = function() {
                        ++n >= i.length && e.onComplete()
                    })
                })
            },
            navivationAnimate: function(currentIndex) {
                (currentIndex <= this.settings.startItem || currentIndex - this.settings.startItem >= this.settings.maxItemDisplay - 1) && (this.settings.startItem = currentIndex - this.settings.maxItemDisplay + 2, this.settings.startItem < 0 && (this.settings.startItem = 0), this.settings.startItem > this.slides.length - this.settings.maxItemDisplay && (this.settings.startItem = this.slides.length - this.settings.maxItemDisplay)), this.navigatorInner.stop().animate(eval("({" + this.navigratorStep[0] + ":-" + this.settings.startItem * this.navigratorStep[1] + "})"), {
                    duration: 500,
                    easing: "easeInOutQuad"
                })
            },
            setNavActive: function(t, e) {
                this.navigatorItems && (this.navigatorItems.removeClass("active"), $(this.navigatorItems.get(t)).addClass("active"), this.navivationAnimate(this.currentNo))
            },
            __getPositionMode: function(t) {
                return "horizontal" == t ? ["left", this.settings.navigatorWidth] : ["top", this.settings.navigatorHeight]
            },
            __getDirectionMode: function() {
                switch (this.settings.direction) {
                    case "opacity":
                        return this.maxSize = 0, ["opacity", "opacity"];
                    default:
                        return this.maxSize = this.maxWidth, ["left", "width"]
                }
            },
            registerWheelHandler: function(t, e) {
                t.bind("mousewheel", function(t, i) {
                    Math.abs(i);
                    return i > 0 ? e.previous(!0) : e.next(!0), !1
                })
            },
            registerButtonsControl: function(t, e, i) {
                for (var n in e) switch (n.toString()) {
                    case "next":
                        e[n].click(function() {
                            i.next(!0)
                        });
                        break;
                    case "previous":
                        e[n].click(function() {
                            i.previous(!0)
                        })
                }
                return this
            },
            onProcessing: function(t, e, i) {
                return this.previousNo = this.currentNo + (this.currentNo > 0 ? -1 : this.slides.length - 1), this.nextNo = this.currentNo + (this.currentNo < this.slides.length - 1 ? 1 : 1 - this.slides.length), this
            },
            finishFx: function(t) {
                t && this.stop(), t && this.settings.auto && this.play(this.settings.interval, "next", !0), this.setNavActive(this.currentNo), this.settings.onPlaySlider(this, $(this.slides).eq(this.currentNo))
            },
            getObjectDirection: function(start, end) {
                return eval("({'" + this.directionMode[0] + "':-" + this.currentNo * start + "})")
            },
            fxStart: function(t, e, i) {
                var n = this;
                return "opacity" == this.settings.direction ? ($(this.slides).stop().animate({
                    opacity: 0
                }, {
                    duration: this.settings.duration,
                    easing: this.settings.easing,
                    complete: function() {
                        n.slides.css("z-index", "1"), n.slides.eq(t).css("z-index", "3")
                    }
                }), $(this.slides).eq(t).stop().animate({
                    opacity: 1
                }, {
                    duration: this.settings.duration,
                    easing: this.settings.easing,
                    complete: function() {
                        n.settings.onComplete($(n.slides).eq(t), t)
                    }
                })) : this.wrapper.stop().animate(e, {
                    duration: this.settings.duration,
                    easing: this.settings.easing,
                    complete: function() {
                        n.settings.onComplete($(n.slides).eq(t), t)
                    }
                }), this
            },
            jumping: function(no, manual) {
                if (this.stop(), this.currentNo != no) {
                    var obj = eval("({'" + this.directionMode[0] + "':-" + this.maxSize * no + "})");
                    this.onProcessing(null, manual, 0, this.maxSize).fxStart(no, obj, this).finishFx(manual), this.currentNo = no
                }
            },
            next: function(t, e) {
                this.currentNo += this.currentNo < this.slides.length - 1 ? 1 : 1 - this.slides.length, this.onProcessing(e, t, 0, this.maxSize).fxStart(this.currentNo, this.getObjectDirection(this.maxSize), this).finishFx(t)
            },
            previous: function(t, e) {
                this.currentNo += this.currentNo > 0 ? -1 : this.slides.length - 1, this.onProcessing(e, t).fxStart(this.currentNo, this.getObjectDirection(this.maxSize), this).finishFx(t)
            },
            play: function(t, e, i) {
                this.stop(), i || this[e](!1);
                var n = this;
                this.isRun = setTimeout(function() {
                    n[e](!0)
                }, t)
            },
            stop: function() {
                null != this.isRun && (clearTimeout(this.isRun), this.isRun = null)
            }
        })
    }(jQuery),
    function(t) {
        "use strict";
        "function" == typeof define && define.amd ? define(["jquery"], t) : t(jQuery)
    }(function(t) {
        "use strict";
        var e = [],
            i = [],
            n = {
                precision: 100,
                elapse: !1,
                defer: !1
            };
        i.push(/^[0-9]*$/.source), i.push(/([0-9]{1,2}\/){2}[0-9]{4}( [0-9]{1,2}(:[0-9]{2}){2})?/.source), i.push(/[0-9]{4}([\/\-][0-9]{1,2}){2}( [0-9]{1,2}(:[0-9]{2}){2})?/.source), i = new RegExp(i.join("|"));
        var s = {
            h: "hoursOne",
            H: "hoursTwo",
            m: "minutesOne",
            M: "minutesTwo",
            s: "secondsFirst",
            S: "secondsTwo",
            d: "totalDaysOne",
            D: "totalDaysTwo"
        };
        var o = function(i, s, o) {
            this.el = i, this.$el = t(i), this.interval = null, this.offset = {}, this.options = t.extend({}, n), this.instanceNumber = e.length, e.push(this), this.$el.data("countdown-instance", this.instanceNumber), o && ("function" == typeof o ? (this.$el.on("update.countdown", o), this.$el.on("stoped.countdown", o), this.$el.on("finish.countdown", o)) : this.options = t.extend({}, n, o)), this.setFinalDate(s), !1 === this.options.defer && this.start()
        };
        t.extend(o.prototype, {
            start: function() {
                null !== this.interval && clearInterval(this.interval);
                var t = this;
                this.update(), this.interval = setInterval(function() {
                    t.update.call(t)
                }, this.options.precision)
            },
            stop: function() {
                clearInterval(this.interval), this.interval = null, this.dispatchEvent("stoped")
            },
            toggle: function() {
                this.interval ? this.stop() : this.start()
            },
            pause: function() {
                this.stop()
            },
            resume: function() {
                this.start()
            },
            remove: function() {
                this.stop.call(this), e[this.instanceNumber] = null, delete this.$el.data().countdownInstance
            },
            setFinalDate: function(t) {
                this.finalDate = new Date(t)
            },
            update: function() {
                if (0 !== this.$el.closest("html").length) {
                    var e, i = void 0 !== t._data(this.el, "events"),
                        n = new Date;
                    e = this.finalDate.getTime() - n.getTime(), e = Math.ceil(e / 1e3), e = !this.options.elapse && e < 0 ? 0 : Math.abs(e), this.totalSecsLeft !== e && i && (this.totalSecsLeft = e, this.elapsed = n >= this.finalDate, this.offset = {
                        secondsFirst: Math.floor(this.totalSecsLeft % 60 % 60 / 10),
                        secondsTwo: Math.floor(this.totalSecsLeft % 60 % 60 % 10),
                        minutesOne: Math.floor(Math.floor(this.totalSecsLeft / 60) % 60 / 10),
                        minutesTwo: Math.floor(Math.floor(this.totalSecsLeft / 60) % 60 % 10),
                        hoursOne: Math.floor(Math.floor(this.totalSecsLeft / 60 / 60) % 24 / 10),
                        hoursTwo: Math.floor(Math.floor(this.totalSecsLeft / 60 / 60) % 24 % 10),
                        totalDaysOne: Math.floor(Math.floor(this.totalSecsLeft / 60 / 60 / 24) / 10),
                        totalDaysTwo: Math.floor(Math.floor(this.totalSecsLeft / 60 / 60 / 24) % 10),
                        totalHours: Math.floor(this.totalSecsLeft / 60 / 60),
                        totalMinutes: Math.floor(this.totalSecsLeft / 60),
                        totalSeconds: this.totalSecsLeft
                    }, this.options.elapse || 0 !== this.totalSecsLeft ? this.dispatchEvent("update") : (this.stop(), this.dispatchEvent("finish")))
                } else this.remove()
            },
            dispatchEvent: function(e) {
                var i, n = t.Event(e + ".countdown");
                n.finalDate = this.finalDate, n.elapsed = this.elapsed, n.offset = t.extend({}, this.offset), n.strftime = (i = this.offset, function(t) {
                    var e, n, o, a, r, u, h = t.match(/%(-|!)?[A-Z]{1}(:[^;]+;)?/gi);
                    if (h)
                        for (var l = 0, c = h.length; l < c; ++l) {
                            var d = h[l].match(/%(-|!)?([a-zA-Z]{1})(:[^;]+;)?/),
                                p = (e = d[0], n = e.toString().replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1"), new RegExp(n)),
                                f = d[1] || "",
                                v = d[3] || "",
                                g = null;
                            d = d[2], s.hasOwnProperty(d) && (g = s[d], g = Number(i[g])), null !== g && ("!" === f && (a = g, r = void 0, u = void 0, r = "s", u = "", (o = v) && (1 === (o = o.replace(/(:|;|\s)/gi, "").split(/\,/)).length ? r = o[0] : (u = o[0], r = o[1])), g = Math.abs(a) > 1 ? r : u), t = t.replace(p, g.toString()))
                        }
                    return t = t.replace(/%%/, "%")
                }), this.$el.trigger(n)
            }
        }), t.fn.countdown = function() {
            var i = Array.prototype.slice.call(arguments, 0);
            return this.each(function() {
                var n = t(this).data("countdown-instance");
                if (void 0 !== n) {
                    var s = e[n],
                        a = i[0];
                    o.prototype.hasOwnProperty(a) ? s[a].apply(s, i.slice(1)) : null === String(a).match(/^[$A-Z_][0-9A-Z_$]*$/i) ? (s.setFinalDate.call(s, a), s.start()) : t.error("Method %s does not exist on jQuery.countdown".replace(/\%s/gi, a))
                } else new o(this, i[0], i[1])
            })
        }
    }), jQuery(document).ready(function() {
        var t = {
            previous: jQuery("#lofslider .button-previous"),
            next: jQuery("#lofslider .button-next")
        };
        jQuery("#lofslider").lofJSidernews({
            interval: 5e3,
            easing: "easeInOutExpo",
            direction: "opacity",
            duration: 500,
            auto: !0,
            maxItemDisplay: 10,
            buttons: t
        })
    }),
    function(t) {
        t.fn.loadImages = function(e) {
            var i = t.extend({
                template: "<div class='loading'></div>",
                callback: null
            }, e);
            return this.each(function() {
                t(this).parent().addClass("ss-loading").append("<div class='loading-img'>" + i.template + "</div>"), t(this).each(function() {
                    var e = t(this).parent();
                    e.css({
                        position: "relative",
                        overflow: "hidden"
                    }), e.is("a") && e.css({
                        display: "inline-block"
                    }), t(this).on("load", function() {
                        t(this).parent().find(".loading-img").fadeOut(function() {}), t.isFunction(i.callback) && i.callback.call(this)
                    })
                }), t(window).on("load", function() {
                    t(".loading-img").fadeOut(function() {})
                })
            })
        }
    }(jQuery),
    function(t, e, i) {
        "function" == typeof define && define.amd ? define(["jquery"], function(n) {
            return i(n, t, e), n.mobile
        }) : i(t.jQuery, t, e)
    }(this, document, function(t, e, i, n) {
        var s, o;
        (function(t, e, i, n) {
            function s(t) {
                for (; t && void 0 !== t.originalEvent;) t = t.originalEvent;
                return t
            }

            function o(e) {
                for (var i, n, s = {}; e;) {
                    i = t.data(e, x);
                    for (n in i) i[n] && (s[n] = s.hasVirtualBinding = !0);
                    e = e.parentNode
                }
                return s
            }

            function a() {
                k = !0
            }

            function r() {
                k = !1
            }

            function u() {
                h(), $ = setTimeout(function() {
                    $ = 0, Q = 0, _.length = 0, N = !1, a()
                }, t.vmouse.resetTimerDuration)
            }

            function h() {
                $ && (clearTimeout($), $ = 0)
            }

            function l(e, i, o) {
                var a;
                return (o && o[e] || !o && function(e, i) {
                    for (var n; e;) {
                        if ((n = t.data(e, x)) && (!i || n[i])) return e;
                        e = e.parentNode
                    }
                    return null
                }(i.target, e)) && (a = function(e, i) {
                    var o, a, r, u, h, l, c, d, p, f = e.type;
                    if ((e = t.Event(e)).type = i, o = e.originalEvent, a = t.event.props, f.search(/^(mouse|click)/) > -1 && (a = D), o)
                        for (c = a.length; c;) u = a[--c], e[u] = o[u];
                    if (f.search(/mouse(down|up)|click/) > -1 && !e.which && (e.which = 1), -1 !== f.search(/^touch/) && (f = (r = s(o)).touches, h = r.changedTouches, l = f && f.length ? f[0] : h && h.length ? h[0] : n))
                        for (d = 0, p = M.length; d < p; d++) u = M[d], e[u] = l[u];
                    return e
                }(i, e), t(i.target).trigger(a)), a
            }

            function c(e) {
                var i, n = t.data(e.target, y);
                !N && (!Q || Q !== n) && ((i = l("v" + e.type, e)) && (i.isDefaultPrevented() && e.preventDefault(), i.isPropagationStopped() && e.stopPropagation(), i.isImmediatePropagationStopped() && e.stopImmediatePropagation()))
            }

            function d(e) {
                var i, n, a, u = s(e).touches;
                u && 1 === u.length && ((n = o(i = e.target)).hasVirtualBinding && (Q = E++, t.data(i, y, Q), h(), r(), L = !1, a = s(e).touches[0], T = a.pageX, A = a.pageY, l("vmouseover", e, n), l("vmousedown", e, n)))
            }

            function p(t) {
                k || (L || l("vmousecancel", t, o(t.target)), L = !0, u())
            }

            function f(e) {
                if (!k) {
                    var i = s(e).touches[0],
                        n = L,
                        a = t.vmouse.moveDistanceThreshold,
                        r = o(e.target);
                    (L = L || Math.abs(i.pageX - T) > a || Math.abs(i.pageY - A) > a) && !n && l("vmousecancel", e, r), l("vmousemove", e, r), u()
                }
            }

            function v(t) {
                if (!k) {
                    a();
                    var e, i, n = o(t.target);
                    l("vmouseup", t, n), L || (e = l("vclick", t, n)) && e.isDefaultPrevented() && (i = s(t).changedTouches[0], _.push({
                        touchID: Q,
                        x: i.clientX,
                        y: i.clientY
                    }), N = !0), l("vmouseout", t, n), L = !1, u()
                }
            }

            function g(e) {
                var i, n = t.data(e, x);
                if (n)
                    for (i in n)
                        if (n[i]) return !0;
                return !1
            }

            function m() {}

            function w(e) {
                var i = e.substr(1);
                return {
                    setup: function() {
                        g(this) || t.data(this, x, {}), t.data(this, x)[e] = !0, O[e] = (O[e] || 0) + 1, 1 === O[e] && j.bind(i, c), t(this).bind(i, m), P && (O.touchstart = (O.touchstart || 0) + 1, 1 === O.touchstart && j.bind("touchstart", d).bind("touchend", v).bind("touchmove", f).bind("scroll", p))
                    },
                    teardown: function() {
                        --O[e], O[e] || j.unbind(i, c), P && (--O.touchstart, O.touchstart || j.unbind("touchstart", d).unbind("touchmove", f).unbind("touchend", v).unbind("scroll", p));
                        var n = t(this),
                            s = t.data(this, x);
                        s && (s[e] = !1), n.unbind(i, m), g(this) || n.removeData(x)
                    }
                }
            }
            var I, b, x = "virtualMouseBindings",
                y = "virtualTouchID",
                S = "vmouseover vmousedown vmousemove vmouseup vclick vmouseout vmousecancel".split(" "),
                M = "clientX clientY pageX pageY screenX screenY".split(" "),
                C = t.event.mouseHooks ? t.event.mouseHooks.props : [],
                D = t.event.props.concat(C),
                O = {},
                $ = 0,
                T = 0,
                A = 0,
                L = !1,
                _ = [],
                N = !1,
                k = !1,
                P = "addEventListener" in i,
                j = t(i),
                E = 1,
                Q = 0;
            for (t.vmouse = {
                    moveDistanceThreshold: 10,
                    clickDistanceThreshold: 10,
                    resetTimerDuration: 1500
                }, b = 0; b < S.length; b++) t.event.special[S[b]] = w(S[b]);
            P && i.addEventListener("click", function(e) {
                var i, n, s, o, a, r = _.length,
                    u = e.target;
                if (r)
                    for (i = e.clientX, n = e.clientY, I = t.vmouse.clickDistanceThreshold, s = u; s;) {
                        for (o = 0; o < r; o++)
                            if (a = _[o], 0, s === u && Math.abs(a.x - i) < I && Math.abs(a.y - n) < I || t.data(s, y) === a.touchID) return e.preventDefault(), void e.stopPropagation();
                        s = s.parentNode
                    }
            }, !0)
        })(t, 0, i), t.mobile = {}, o = {
                touch: "ontouchend" in i
            }, (s = t).mobile.support = s.mobile.support || {}, s.extend(s.support, o), s.extend(s.mobile.support, o),
            function(t, e, n) {
                function s(e, i, s, o) {
                    var a = s.type;
                    s.type = i, o ? t.event.trigger(s, n, e) : t.event.dispatch.call(e, s), s.type = a
                }
                var o = t(i),
                    a = t.mobile.support.touch,
                    r = "touchmove scroll",
                    u = a ? "touchstart" : "mousedown",
                    h = a ? "touchend" : "mouseup",
                    l = a ? "touchmove" : "mousemove";
                t.each("touchstart touchmove touchend tap taphold swipe swipeleft swiperight scrollstart scrollstop".split(" "), function(e, i) {
                    t.fn[i] = function(t) {
                        return t ? this.bind(i, t) : this.trigger(i)
                    }, t.attrFn && (t.attrFn[i] = !0)
                }), t.event.special.scrollstart = {
                    enabled: !0,
                    setup: function() {
                        function e(t, e) {
                            s(o, (i = e) ? "scrollstart" : "scrollstop", t)
                        }
                        var i, n, o = this;
                        t(o).bind(r, function(s) {
                            t.event.special.scrollstart.enabled && (i || e(s, !0), clearTimeout(n), n = setTimeout(function() {
                                e(s, !1)
                            }, 50))
                        })
                    },
                    teardown: function() {
                        t(this).unbind(r)
                    }
                }, t.event.special.tap = {
                    tapholdThreshold: 750,
                    emitTapOnTaphold: !0,
                    setup: function() {
                        var e = this,
                            i = t(e),
                            n = !1;
                        i.bind("vmousedown", function(a) {
                            function r() {
                                clearTimeout(l)
                            }

                            function u() {
                                r(), i.unbind("vclick", h).unbind("vmouseup", r), o.unbind("vmousecancel", u)
                            }

                            function h(t) {
                                u(), n || c !== t.target ? n && t.preventDefault() : s(e, "tap", t)
                            }
                            if (n = !1, a.which && 1 !== a.which) return !1;
                            var l, c = a.target;
                            i.bind("vmouseup", r).bind("vclick", h), o.bind("vmousecancel", u), l = setTimeout(function() {
                                t.event.special.tap.emitTapOnTaphold || (n = !0), s(e, "taphold", t.Event("taphold", {
                                    target: c
                                }))
                            }, t.event.special.tap.tapholdThreshold)
                        })
                    },
                    teardown: function() {
                        t(this).unbind("vmousedown").unbind("vclick").unbind("vmouseup"), o.unbind("vmousecancel")
                    }
                }, t.event.special.swipe = {
                    scrollSupressionThreshold: 30,
                    durationThreshold: 1e3,
                    horizontalDistanceThreshold: 30,
                    verticalDistanceThreshold: 30,
                    getLocation: function(t) {
                        var i = e.pageXOffset,
                            n = e.pageYOffset,
                            s = t.clientX,
                            o = t.clientY;
                        return 0 === t.pageY && Math.floor(o) > Math.floor(t.pageY) || 0 === t.pageX && Math.floor(s) > Math.floor(t.pageX) ? (s -= i, o -= n) : (o < t.pageY - n || s < t.pageX - i) && (s = t.pageX - i, o = t.pageY - n), {
                            x: s,
                            y: o
                        }
                    },
                    start: function(e) {
                        var i = e.originalEvent.touches ? e.originalEvent.touches[0] : e,
                            n = t.event.special.swipe.getLocation(i);
                        return {
                            time: (new Date).getTime(),
                            coords: [n.x, n.y],
                            origin: t(e.target)
                        }
                    },
                    stop: function(e) {
                        var i = e.originalEvent.touches ? e.originalEvent.touches[0] : e,
                            n = t.event.special.swipe.getLocation(i);
                        return {
                            time: (new Date).getTime(),
                            coords: [n.x, n.y]
                        }
                    },
                    handleSwipe: function(e, i, n, o) {
                        if (i.time - e.time < t.event.special.swipe.durationThreshold && Math.abs(e.coords[0] - i.coords[0]) > t.event.special.swipe.horizontalDistanceThreshold && Math.abs(e.coords[1] - i.coords[1]) < t.event.special.swipe.verticalDistanceThreshold) {
                            var a = e.coords[0] > i.coords[0] ? "swipeleft" : "swiperight";
                            return s(n, "swipe", t.Event("swipe", {
                                target: o,
                                swipestart: e,
                                swipestop: i
                            }), !0), s(n, a, t.Event(a, {
                                target: o,
                                swipestart: e,
                                swipestop: i
                            }), !0), !0
                        }
                        return !1
                    },
                    eventInProgress: !1,
                    setup: function() {
                        var e, i = this,
                            n = t(i),
                            s = {};
                        (e = t.data(this, "mobile-events")) || (e = {
                            length: 0
                        }, t.data(this, "mobile-events", e)), e.length++, e.swipe = s, s.start = function(e) {
                            if (!t.event.special.swipe.eventInProgress) {
                                t.event.special.swipe.eventInProgress = !0;
                                var n, a = t.event.special.swipe.start(e),
                                    r = e.target,
                                    u = !1;
                                s.move = function(e) {
                                    a && !e.isDefaultPrevented() && (n = t.event.special.swipe.stop(e), u || (u = t.event.special.swipe.handleSwipe(a, n, i, r)) && (t.event.special.swipe.eventInProgress = !1), Math.abs(a.coords[0] - n.coords[0]) > t.event.special.swipe.scrollSupressionThreshold && e.preventDefault())
                                }, s.stop = function() {
                                    u = !0, t.event.special.swipe.eventInProgress = !1, o.off(l, s.move), s.move = null
                                }, o.on(l, s.move).one(h, s.stop)
                            }
                        }, n.on(u, s.start)
                    },
                    teardown: function() {
                        var e, i;
                        (e = t.data(this, "mobile-events")) && (i = e.swipe, delete e.swipe, e.length--, 0 === e.length && t.removeData(this, "mobile-events")), i && (i.start && t(this).off(u, i.start), i.move && o.off(l, i.move), i.stop && o.off(h, i.stop))
                    }
                }, t.each({
                    scrollstop: "scrollstart",
                    taphold: "tap",
                    swipeleft: "swipe.left",
                    swiperight: "swipe.right"
                }, function(e, i) {
                    t.event.special[e] = {
                        setup: function() {
                            t(this).bind(i, t.noop)
                        },
                        teardown: function() {
                            t(this).unbind(i)
                        }
                    }
                })
            }(t, this)
    });