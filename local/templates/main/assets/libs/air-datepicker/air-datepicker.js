! function (t, e, i) {
    ! function () {
        var s, a, n, h = "2.2.3",
            o = "datepicker",
            r = ".datepicker-here",
            c = !1,
            d = '<div class="datepicker"><i class="datepicker--pointer"></i><nav class="datepicker--nav"></nav><div class="datepicker--content"></div></div>',
            l = {
                classes: "",
                inline: !1,
                language: "ru",
                startDate: new Date,
                firstDay: "",
                weekends: [6, 0],
                dateFormat: "",
                altField: "",
                altFieldDateFormat: "@",
                toggleSelected: !0,
                keyboardNav: !0,
                position: "bottom left",
                offset: 12,
                view: "days",
                minView: "days",
                showOtherMonths: !0,
                selectOtherMonths: !0,
                moveToOtherMonthsOnSelect: !0,
                showOtherYears: !0,
                selectOtherYears: !0,
                moveToOtherYearsOnSelect: !0,
                minDate: "",
                maxDate: "",
                disableNavWhenOutOfRange: !0,
                multipleDates: !1,
                multipleDatesSeparator: ",",
                range: !1,
                todayButton: !1,
                clearButton: !1,
                showEvent: "focus",
                autoClose: !1,
                monthsField: "monthsShort",
                prevHtml: '<svg><path d="M 17,12 l -5,5 l 5,5"></path></svg>',
                nextHtml: '<svg><path d="M 14,12 l 5,5 l -5,5"></path></svg>',
                navTitles: {
                    days: "MM, <i>yyyy</i>",
                    months: "yyyy",
                    years: "yyyy1 - yyyy2"
                },
                timepicker: !1,
                onlyTimepicker: !1,
                dateTimeSeparator: " ",
                timeFormat: "",
                minHours: 0,
                maxHours: 24,
                minMinutes: 0,
                maxMinutes: 59,
                hoursStep: 1,
                minutesStep: 1,
                onSelect: "",
                onShow: "",
                onHide: "",
                onChangeMonth: "",
                onChangeYear: "",
                onChangeDecade: "",
                onChangeView: "",
                onRenderCell: ""
            },
            u = {
                ctrlRight: [17, 39],
                ctrlUp: [17, 38],
                ctrlLeft: [17, 37],
                ctrlDown: [17, 40],
                shiftRight: [16, 39],
                shiftUp: [16, 38],
                shiftLeft: [16, 37],
                shiftDown: [16, 40],
                altUp: [18, 38],
                altRight: [18, 39],
                altLeft: [18, 37],
                altDown: [18, 40],
                ctrlShiftUp: [16, 17, 38]
            },
            m = function (t, a) {
                this.el = t, this.$el = e(t), this.opts = e.extend(!0, {}, l, a, this.$el.data()), s == i && (s = e("body")), this.opts.startDate || (this.opts.startDate = new Date), "INPUT" == this.el.nodeName && (this.elIsInput = !0), this.opts.altField && (this.$altField = "string" == typeof this.opts.altField ? e(this.opts.altField) : this.opts.altField), this.inited = !1, this.visible = !1, this.silent = !1, this.currentDate = this.opts.startDate, this.currentView = this.opts.view, this._createShortCuts(), this.selectedDates = [], this.views = {}, this.keys = [], this.minRange = "", this.maxRange = "", this._prevOnSelectValue = "", this.init()
            };
        n = m, n.prototype = {
            VERSION: h,
            viewIndexes: ["days", "months", "years"],
            init: function () {
                c || this.opts.inline || !this.elIsInput || this._buildDatepickersContainer(), this._buildBaseHtml(), this._defineLocale(this.opts.language), this._syncWithMinMaxDates(), this.elIsInput && (this.opts.inline || (this._setPositionClasses(this.opts.position), this._bindEvents()), this.opts.keyboardNav && !this.opts.onlyTimepicker && this._bindKeyboardEvents(), this.$datepicker.on("mousedown", this._onMouseDownDatepicker.bind(this)), this.$datepicker.on("mouseup", this._onMouseUpDatepicker.bind(this))), this.opts.classes && this.$datepicker.addClass(this.opts.classes), this.opts.timepicker && (this.timepicker = new e.fn.datepicker.Timepicker(this, this.opts), this._bindTimepickerEvents()), this.opts.onlyTimepicker && this.$datepicker.addClass("-only-timepicker-"), this.views[this.currentView] = new e.fn.datepicker.Body(this, this.currentView, this.opts), this.views[this.currentView].show(), this.nav = new e.fn.datepicker.Navigation(this, this.opts), this.view = this.currentView, this.$el.on("clickCell.adp", this._onClickCell.bind(this)), this.$datepicker.on("mouseenter", ".datepicker--cell", this._onMouseEnterCell.bind(this)), this.$datepicker.on("mouseleave", ".datepicker--cell", this._onMouseLeaveCell.bind(this)), this.inited = !0
            },
            _createShortCuts: function () {
                this.minDate = this.opts.minDate ? this.opts.minDate : new Date(-86399999136e5), this.maxDate = this.opts.maxDate ? this.opts.maxDate : new Date(86399999136e5)
            },
            _bindEvents: function () {
                this.$el.on(this.opts.showEvent + ".adp", this._onShowEvent.bind(this)), this.$el.on("mouseup.adp", this._onMouseUpEl.bind(this)), this.$el.on("blur.adp", this._onBlur.bind(this)), this.$el.on("keyup.adp", this._onKeyUpGeneral.bind(this)), e(t).on("resize.adp", this._onResize.bind(this)), e("body").on("mouseup.adp", this._onMouseUpBody.bind(this))
            },
            _bindKeyboardEvents: function () {
                this.$el.on("keydown.adp", this._onKeyDown.bind(this)), this.$el.on("keyup.adp", this._onKeyUp.bind(this)), this.$el.on("hotKey.adp", this._onHotKey.bind(this))
            },
            _bindTimepickerEvents: function () {
                this.$el.on("timeChange.adp", this._onTimeChange.bind(this))
            },
            isWeekend: function (t) {
                return -1 !== this.opts.weekends.indexOf(t)
            },
            _defineLocale: function (t) {
                "string" == typeof t ? (this.loc = e.fn.datepicker.language[t], this.loc || (console.warn("Can't find language \"" + t + '" in Datepicker.language, will use "ru" instead'), this.loc = e.extend(!0, {}, e.fn.datepicker.language.ru)), this.loc = e.extend(!0, {}, e.fn.datepicker.language.ru, e.fn.datepicker.language[t])) : this.loc = e.extend(!0, {}, e.fn.datepicker.language.ru, t), this.opts.dateFormat && (this.loc.dateFormat = this.opts.dateFormat), this.opts.timeFormat && (this.loc.timeFormat = this.opts.timeFormat), "" !== this.opts.firstDay && (this.loc.firstDay = this.opts.firstDay), this.opts.timepicker && (this.loc.dateFormat = [this.loc.dateFormat, this.loc.timeFormat].join(this.opts.dateTimeSeparator)), this.opts.onlyTimepicker && (this.loc.dateFormat = this.loc.timeFormat);
                var i = this._getWordBoundaryRegExp;
                (this.loc.timeFormat.match(i("aa")) || this.loc.timeFormat.match(i("AA"))) && (this.ampm = !0)
            },
            _buildDatepickersContainer: function () {
                c = !0, s.append('<div class="datepickers-container" id="datepickers-container"></div>'), a = e("#datepickers-container")
            },
            _buildBaseHtml: function () {
                var t, i = e('<div class="datepicker-inline">');
                t = "INPUT" == this.el.nodeName ? this.opts.inline ? i.insertAfter(this.$el) : a : i.appendTo(this.$el), this.$datepicker = e(d).appendTo(t), this.$content = e(".datepicker--content", this.$datepicker), this.$nav = e(".datepicker--nav", this.$datepicker)
            },
            _triggerOnChange: function () {
                if (!this.selectedDates.length) {
                    if ("" === this._prevOnSelectValue) return;
                    return this._prevOnSelectValue = "", this.opts.onSelect("", "", this)
                }
                var t, e = this.selectedDates,
                    i = n.getParsedDate(e[0]),
                    s = this,
                    a = new Date(i.year, i.month, i.date, i.hours, i.minutes);
                t = e.map(function (t) {
                    return s.formatDate(s.loc.dateFormat, t)
                }).join(this.opts.multipleDatesSeparator), (this.opts.multipleDates || this.opts.range) && (a = e.map(function (t) {
                    var e = n.getParsedDate(t);
                    return new Date(e.year, e.month, e.date, e.hours, e.minutes)
                })), this._prevOnSelectValue = t, this.opts.onSelect(t, a, this)
            },
            next: function () {
                var t = this.parsedDate,
                    e = this.opts;
                switch (this.view) {
                    case "days":
                        this.date = new Date(t.year, t.month + 1, 1), e.onChangeMonth && e.onChangeMonth(this.parsedDate.month, this.parsedDate.year);
                        break;
                    case "months":
                        this.date = new Date(t.year + 1, t.month, 1), e.onChangeYear && e.onChangeYear(this.parsedDate.year);
                        break;
                    case "years":
                        this.date = new Date(t.year + 10, 0, 1), e.onChangeDecade && e.onChangeDecade(this.curDecade)
                }
            },
            prev: function () {
                var t = this.parsedDate,
                    e = this.opts;
                switch (this.view) {
                    case "days":
                        this.date = new Date(t.year, t.month - 1, 1), e.onChangeMonth && e.onChangeMonth(this.parsedDate.month, this.parsedDate.year);
                        break;
                    case "months":
                        this.date = new Date(t.year - 1, t.month, 1), e.onChangeYear && e.onChangeYear(this.parsedDate.year);
                        break;
                    case "years":
                        this.date = new Date(t.year - 10, 0, 1), e.onChangeDecade && e.onChangeDecade(this.curDecade)
                }
            },
            formatDate: function (t, e) {
                e = e || this.date;
                var i, s = t,
                    a = this._getWordBoundaryRegExp,
                    h = this.loc,
                    o = n.getLeadingZeroNum,
                    r = n.getDecade(e),
                    c = n.getParsedDate(e),
                    d = c.fullHours,
                    l = c.hours,
                    u = t.match(a("aa")) || t.match(a("AA")),
                    m = "am",
                    p = this._replacer;
                switch (this.opts.timepicker && this.timepicker && u && (i = this.timepicker._getValidHoursFromDate(e, u), d = o(i.hours), l = i.hours, m = i.dayPeriod), !0) {
                    case /@/.test(s):
                        s = s.replace(/@/, e.getTime());
                    case /aa/.test(s):
                        s = p(s, a("aa"), m);
                    case /AA/.test(s):
                        s = p(s, a("AA"), m.toUpperCase());
                    case /dd/.test(s):
                        s = p(s, a("dd"), c.fullDate);
                    case /d/.test(s):
                        s = p(s, a("d"), c.date);
                    case /DD/.test(s):
                        s = p(s, a("DD"), h.days[c.day]);
                    case /D/.test(s):
                        s = p(s, a("D"), h.daysShort[c.day]);
                    case /mm/.test(s):
                        s = p(s, a("mm"), c.fullMonth);
                    case /m/.test(s):
                        s = p(s, a("m"), c.month + 1);
                    case /MM/.test(s):
                        s = p(s, a("MM"), this.loc.months[c.month]);
                    case /M/.test(s):
                        s = p(s, a("M"), h.monthsShort[c.month]);
                    case /ii/.test(s):
                        s = p(s, a("ii"), c.fullMinutes);
                    case /i/.test(s):
                        s = p(s, a("i"), c.minutes);
                    case /hh/.test(s):
                        s = p(s, a("hh"), d);
                    case /h/.test(s):
                        s = p(s, a("h"), l);
                    case /yyyy/.test(s):
                        s = p(s, a("yyyy"), c.year);
                    case /yyyy1/.test(s):
                        s = p(s, a("yyyy1"), r[0]);
                    case /yyyy2/.test(s):
                        s = p(s, a("yyyy2"), r[1]);
                    case /yy/.test(s):
                        s = p(s, a("yy"), c.year.toString().slice(-2))
                }
                return s
            },
            _replacer: function (t, e, i) {
                return t.replace(e, function (t, e, s, a) {
                    return e + i + a
                })
            },
            _getWordBoundaryRegExp: function (t) {
                var e = "\\s|\\.|-|/|\\\\|,|\\$|\\!|\\?|:|;";
                return new RegExp("(^|>|" + e + ")(" + t + ")($|<|" + e + ")", "g")
            },
            selectDate: function (t) {
                var e = this,
                    i = e.opts,
                    s = e.parsedDate,
                    a = e.selectedDates,
                    h = a.length,
                    o = "";
                if (Array.isArray(t)) return void t.forEach(function (t) {
                    e.selectDate(t)
                });
                if (t instanceof Date) {
                    if (this.lastSelectedDate = t, this.timepicker && this.timepicker._setTime(t), e._trigger("selectDate", t), this.timepicker && (t.setHours(this.timepicker.hours), t.setMinutes(this.timepicker.minutes)), "days" == e.view && t.getMonth() != s.month && i.moveToOtherMonthsOnSelect && (o = new Date(t.getFullYear(), t.getMonth(), 1)), "years" == e.view && t.getFullYear() != s.year && i.moveToOtherYearsOnSelect && (o = new Date(t.getFullYear(), 0, 1)), o && (e.silent = !0, e.date = o, e.silent = !1, e.nav._render()), i.multipleDates && !i.range) {
                        if (h === i.multipleDates) return;
                        e._isSelected(t) || e.selectedDates.push(t)
                    } else i.range ? 2 == h ? (e.selectedDates = [t], e.minRange = t, e.maxRange = "") : 1 == h ? (e.selectedDates.push(t), e.maxRange ? e.minRange = t : e.maxRange = t, n.bigger(e.maxRange, e.minRange) && (e.maxRange = e.minRange, e.minRange = t), e.selectedDates = [e.minRange, e.maxRange]) : (e.selectedDates = [t], e.minRange = t) : e.selectedDates = [t];
                    e._setInputValue(), i.onSelect && e._triggerOnChange(), i.autoClose && !this.timepickerIsActive && (i.multipleDates || i.range ? i.range && 2 == e.selectedDates.length && e.hide() : e.hide()), e.views[this.currentView]._render()
                }
            },
            removeDate: function (t) {
                var e = this.selectedDates,
                    i = this;
                if (t instanceof Date) return e.some(function (s, a) {
                    return n.isSame(s, t) ? (e.splice(a, 1), i.selectedDates.length ? i.lastSelectedDate = i.selectedDates[i.selectedDates.length - 1] : (i.minRange = "", i.maxRange = "", i.lastSelectedDate = ""), i.views[i.currentView]._render(), i._setInputValue(), i.opts.onSelect && i._triggerOnChange(), !0) : void 0
                })
            },
            today: function () {
                this.silent = !0, this.view = this.opts.minView, this.silent = !1, this.date = new Date, this.opts.todayButton instanceof Date && this.selectDate(this.opts.todayButton)
            },
            clear: function () {
                this.selectedDates = [], this.minRange = "", this.maxRange = "", this.views[this.currentView]._render(), this._setInputValue(), this.opts.onSelect && this._triggerOnChange()
            },
            update: function (t, i) {
                var s = arguments.length,
                    a = this.lastSelectedDate;
                return 2 == s ? this.opts[t] = i : 1 == s && "object" == typeof t && (this.opts = e.extend(!0, this.opts, t)), this._createShortCuts(), this._syncWithMinMaxDates(), this._defineLocale(this.opts.language), this.nav._addButtonsIfNeed(), this.opts.onlyTimepicker || this.nav._render(), this.views[this.currentView]._render(), this.elIsInput && !this.opts.inline && (this._setPositionClasses(this.opts.position), this.visible && this.setPosition(this.opts.position)), this.opts.classes && this.$datepicker.addClass(this.opts.classes), this.opts.onlyTimepicker && this.$datepicker.addClass("-only-timepicker-"), this.opts.timepicker && (a && this.timepicker._handleDate(a), this.timepicker._updateRanges(), this.timepicker._updateCurrentTime(), a && (a.setHours(this.timepicker.hours), a.setMinutes(this.timepicker.minutes))), this._setInputValue(), this
            },
            _syncWithMinMaxDates: function () {
                var t = this.date.getTime();
                this.silent = !0, this.minTime > t && (this.date = this.minDate), this.maxTime < t && (this.date = this.maxDate), this.silent = !1
            },
            _isSelected: function (t, e) {
                var i = !1;
                return this.selectedDates.some(function (s) {
                    return n.isSame(s, t, e) ? (i = s, !0) : void 0
                }), i
            },
            _setInputValue: function () {
                var t, e = this,
                    i = e.opts,
                    s = e.loc.dateFormat,
                    a = i.altFieldDateFormat,
                    n = e.selectedDates.map(function (t) {
                        return e.formatDate(s, t)
                    });
                i.altField && e.$altField.length && (t = this.selectedDates.map(function (t) {
                    return e.formatDate(a, t)
                }), t = t.join(this.opts.multipleDatesSeparator), this.$altField.val(t)), n = n.join(this.opts.multipleDatesSeparator), this.$el.val(n)
            },
            _isInRange: function (t, e) {
                var i = t.getTime(),
                    s = n.getParsedDate(t),
                    a = n.getParsedDate(this.minDate),
                    h = n.getParsedDate(this.maxDate),
                    o = new Date(s.year, s.month, a.date).getTime(),
                    r = new Date(s.year, s.month, h.date).getTime(),
                    c = {
                        day: i >= this.minTime && i <= this.maxTime,
                        month: o >= this.minTime && r <= this.maxTime,
                        year: s.year >= a.year && s.year <= h.year
                    };
                return e ? c[e] : c.day
            },
            _getDimensions: function (t) {
                var e = t.offset();
                return {
                    width: t.outerWidth(),
                    height: t.outerHeight(),
                    left: e.left,
                    top: e.top
                }
            },
            _getDateFromCell: function (t) {
                var e = this.parsedDate,
                    s = t.data("year") || e.year,
                    a = t.data("month") == i ? e.month : t.data("month"),
                    n = t.data("date") || 1;
                return new Date(s, a, n)
            },
            _setPositionClasses: function (t) {
                t = t.split(" ");
                var e = t[0],
                    i = t[1],
                    s = "datepicker -" + e + "-" + i + "- -from-" + e + "-";
                this.visible && (s += " active"), this.$datepicker.removeAttr("class").addClass(s)
            },
            setPosition: function (t) {
                t = t || this.opts.position;
                var e, i, s = this._getDimensions(this.$el),
                    a = this._getDimensions(this.$datepicker),
                    n = t.split(" "),
                    h = this.opts.offset,
                    o = n[0],
                    r = n[1];
                switch (o) {
                    case "top":
                        e = s.top - a.height - h;
                        break;
                    case "right":
                        i = s.left + s.width + h;
                        break;
                    case "bottom":
                        e = s.top + s.height + h;
                        break;
                    case "left":
                        i = s.left - a.width - h
                }
                switch (r) {
                    case "top":
                        e = s.top;
                        break;
                    case "right":
                        i = s.left + s.width - a.width;
                        break;
                    case "bottom":
                        e = s.top + s.height - a.height;
                        break;
                    case "left":
                        i = s.left;
                        break;
                    case "center":
                        /left|right/.test(o) ? e = s.top + s.height / 2 - a.height / 2 : i = s.left + s.width / 2 - a.width / 2
                }
                this.$datepicker.css({
                    left: i,
                    top: e
                })
            },
            show: function () {
                var t = this.opts.onShow;
                this.setPosition(this.opts.position), this.$datepicker.addClass("active"), this.visible = !0, t && this._bindVisionEvents(t)
            },
            hide: function () {
                var t = this.opts.onHide;
                this.$datepicker.removeClass("active").css({
                    left: "-100000px"
                }), this.focused = "", this.keys = [], this.inFocus = !1, this.visible = !1, this.$el.blur(), t && this._bindVisionEvents(t)
            },
            down: function (t) {
                this._changeView(t, "down")
            },
            up: function (t) {
                this._changeView(t, "up")
            },
            _bindVisionEvents: function (t) {
                this.$datepicker.off("transitionend.dp"), t(this, !1), this.$datepicker.one("transitionend.dp", t.bind(this, this, !0))
            },
            _changeView: function (t, e) {
                t = t || this.focused || this.date;
                var i = "up" == e ? this.viewIndex + 1 : this.viewIndex - 1;
                i > 2 && (i = 2), 0 > i && (i = 0), this.silent = !0, this.date = new Date(t.getFullYear(), t.getMonth(), 1), this.silent = !1, this.view = this.viewIndexes[i]
            },
            _handleHotKey: function (t) {
                var e, i, s, a = n.getParsedDate(this._getFocusedDate()),
                    h = this.opts,
                    o = !1,
                    r = !1,
                    c = !1,
                    d = a.year,
                    l = a.month,
                    u = a.date;
                switch (t) {
                    case "ctrlRight":
                    case "ctrlUp":
                        l += 1, o = !0;
                        break;
                    case "ctrlLeft":
                    case "ctrlDown":
                        l -= 1, o = !0;
                        break;
                    case "shiftRight":
                    case "shiftUp":
                        r = !0, d += 1;
                        break;
                    case "shiftLeft":
                    case "shiftDown":
                        r = !0, d -= 1;
                        break;
                    case "altRight":
                    case "altUp":
                        c = !0, d += 10;
                        break;
                    case "altLeft":
                    case "altDown":
                        c = !0, d -= 10;
                        break;
                    case "ctrlShiftUp":
                        this.up()
                }
                s = n.getDaysCount(new Date(d, l)), i = new Date(d, l, u), u > s && (u = s), i.getTime() < this.minTime ? i = this.minDate : i.getTime() > this.maxTime && (i = this.maxDate), this.focused = i, e = n.getParsedDate(i), o && h.onChangeMonth && h.onChangeMonth(e.month, e.year), r && h.onChangeYear && h.onChangeYear(e.year), c && h.onChangeDecade && h.onChangeDecade(this.curDecade)
            },
            _registerKey: function (t) {
                var e = this.keys.some(function (e) {
                    return e == t
                });
                e || this.keys.push(t)
            },
            _unRegisterKey: function (t) {
                var e = this.keys.indexOf(t);
                this.keys.splice(e, 1)
            },
            _isHotKeyPressed: function () {
                var t, e = !1,
                    i = this,
                    s = this.keys.sort();
                for (var a in u) t = u[a], s.length == t.length && t.every(function (t, e) {
                    return t == s[e]
                }) && (i._trigger("hotKey", a), e = !0);
                return e
            },
            _trigger: function (t, e) {
                this.$el.trigger(t, e)
            },
            _focusNextCell: function (t, e) {
                e = e || this.cellType;
                var i = n.getParsedDate(this._getFocusedDate()),
                    s = i.year,
                    a = i.month,
                    h = i.date;
                if (!this._isHotKeyPressed()) {
                    switch (t) {
                        case 37:
                            "day" == e ? h -= 1 : "", "month" == e ? a -= 1 : "", "year" == e ? s -= 1 : "";
                            break;
                        case 38:
                            "day" == e ? h -= 7 : "", "month" == e ? a -= 3 : "", "year" == e ? s -= 4 : "";
                            break;
                        case 39:
                            "day" == e ? h += 1 : "", "month" == e ? a += 1 : "", "year" == e ? s += 1 : "";
                            break;
                        case 40:
                            "day" == e ? h += 7 : "", "month" == e ? a += 3 : "", "year" == e ? s += 4 : ""
                    }
                    var o = new Date(s, a, h);
                    o.getTime() < this.minTime ? o = this.minDate : o.getTime() > this.maxTime && (o = this.maxDate), this.focused = o
                }
            },
            _getFocusedDate: function () {
                var t = this.focused || this.selectedDates[this.selectedDates.length - 1],
                    e = this.parsedDate;
                if (!t) switch (this.view) {
                    case "days":
                        t = new Date(e.year, e.month, (new Date).getDate());
                        break;
                    case "months":
                        t = new Date(e.year, e.month, 1);
                        break;
                    case "years":
                        t = new Date(e.year, 0, 1)
                }
                return t
            },
            _getCell: function (t, i) {
                i = i || this.cellType;
                var s, a = n.getParsedDate(t),
                    h = '.datepicker--cell[data-year="' + a.year + '"]';
                switch (i) {
                    case "month":
                        h = '[data-month="' + a.month + '"]';
                        break;
                    case "day":
                        h += '[data-month="' + a.month + '"][data-date="' + a.date + '"]'
                }
                return s = this.views[this.currentView].$el.find(h), s.length ? s : e("")
            },
            destroy: function () {
                var t = this;
                t.$el.off(".adp").data("datepicker", ""), t.selectedDates = [], t.focused = "", t.views = {}, t.keys = [], t.minRange = "", t.maxRange = "", t.opts.inline || !t.elIsInput ? t.$datepicker.closest(".datepicker-inline").remove() : t.$datepicker.remove()
            },
            _handleAlreadySelectedDates: function (t, e) {
                this.opts.range ? this.opts.toggleSelected ? this.removeDate(e) : 2 != this.selectedDates.length && this._trigger("clickCell", e) : this.opts.toggleSelected && this.removeDate(e), this.opts.toggleSelected || (this.lastSelectedDate = t, this.opts.timepicker && (this.timepicker._setTime(t), this.timepicker.update()))
            },
            _onShowEvent: function (t) {
                this.visible || this.show()
            },
            _onBlur: function () {
                !this.inFocus && this.visible && this.hide()
            },
            _onMouseDownDatepicker: function (t) {
                this.inFocus = !0
            },
            _onMouseUpDatepicker: function (t) {
                this.inFocus = !1, t.originalEvent.inFocus = !0, t.originalEvent.timepickerFocus || this.$el.focus()
            },
            _onKeyUpGeneral: function (t) {
                var e = this.$el.val();
                e || this.clear()
            },
            _onResize: function () {
                this.visible && this.setPosition()
            },
            _onMouseUpBody: function (t) {
                t.originalEvent.inFocus || this.visible && !this.inFocus && this.hide()
            },
            _onMouseUpEl: function (t) {
                t.originalEvent.inFocus = !0, setTimeout(this._onKeyUpGeneral.bind(this), 4)
            },
            _onKeyDown: function (t) {
                var e = t.which;
                if (this._registerKey(e), e >= 37 && 40 >= e && (t.preventDefault(), this._focusNextCell(e)), 13 == e && this.focused) {
                    if (this._getCell(this.focused).hasClass("-disabled-")) return;
                    if (this.view != this.opts.minView) this.down();
                    else {
                        var i = this._isSelected(this.focused, this.cellType);
                        if (!i) return this.timepicker && (this.focused.setHours(this.timepicker.hours), this.focused.setMinutes(this.timepicker.minutes)), void this.selectDate(this.focused);
                        this._handleAlreadySelectedDates(i, this.focused)
                    }
                }
                27 == e && this.hide()
            },
            _onKeyUp: function (t) {
                var e = t.which;
                this._unRegisterKey(e)
            },
            _onHotKey: function (t, e) {
                this._handleHotKey(e)
            },
            _onMouseEnterCell: function (t) {
                var i = e(t.target).closest(".datepicker--cell"),
                    s = this._getDateFromCell(i);
                this.silent = !0, this.focused && (this.focused = ""), i.addClass("-focus-"), this.focused = s, this.silent = !1, this.opts.range && 1 == this.selectedDates.length && (this.minRange = this.selectedDates[0], this.maxRange = "", n.less(this.minRange, this.focused) && (this.maxRange = this.minRange, this.minRange = ""), this.views[this.currentView]._update())
            },
            _onMouseLeaveCell: function (t) {
                var i = e(t.target).closest(".datepicker--cell");
                i.removeClass("-focus-"), this.silent = !0, this.focused = "", this.silent = !1
            },
            _onTimeChange: function (t, e, i) {
                var s = new Date,
                    a = this.selectedDates,
                    n = !1;
                a.length && (n = !0, s = this.lastSelectedDate), s.setHours(e), s.setMinutes(i), n || this._getCell(s).hasClass("-disabled-") ? (this._setInputValue(), this.opts.onSelect && this._triggerOnChange()) : this.selectDate(s)
            },
            _onClickCell: function (t, e) {
                this.timepicker && (e.setHours(this.timepicker.hours), e.setMinutes(this.timepicker.minutes)), this.selectDate(e)
            },
            set focused(t) {
                if (!t && this.focused) {
                    var e = this._getCell(this.focused);
                    e.length && e.removeClass("-focus-")
                }
                this._focused = t, this.opts.range && 1 == this.selectedDates.length && (this.minRange = this.selectedDates[0], this.maxRange = "", n.less(this.minRange, this._focused) && (this.maxRange = this.minRange, this.minRange = "")), this.silent || (this.date = t)
            },
            get focused() {
                return this._focused
            },
            get parsedDate() {
                return n.getParsedDate(this.date)
            },
            set date(t) {
                return t instanceof Date ? (this.currentDate = t, this.inited && !this.silent && (this.views[this.view]._render(), this.nav._render(), this.visible && this.elIsInput && this.setPosition()), t) : void 0
            },
            get date() {
                return this.currentDate
            },
            set view(t) {
                return this.viewIndex = this.viewIndexes.indexOf(t), this.viewIndex < 0 ? void 0 : (this.prevView = this.currentView, this.currentView = t, this.inited && (this.views[t] ? this.views[t]._render() : this.views[t] = new e.fn.datepicker.Body(this, t, this.opts), this.views[this.prevView].hide(), this.views[t].show(), this.nav._render(), this.opts.onChangeView && this.opts.onChangeView(t), this.elIsInput && this.visible && this.setPosition()), t)
            },
            get view() {
                return this.currentView
            },
            get cellType() {
                return this.view.substring(0, this.view.length - 1)
            },
            get minTime() {
                var t = n.getParsedDate(this.minDate);
                return new Date(t.year, t.month, t.date).getTime()
            },
            get maxTime() {
                var t = n.getParsedDate(this.maxDate);
                return new Date(t.year, t.month, t.date).getTime()
            },
            get curDecade() {
                return n.getDecade(this.date)
            }
        }, n.getDaysCount = function (t) {
            return new Date(t.getFullYear(), t.getMonth() + 1, 0).getDate()
        }, n.getParsedDate = function (t) {
            return {
                year: t.getFullYear(),
                month: t.getMonth(),
                fullMonth: t.getMonth() + 1 < 10 ? "0" + (t.getMonth() + 1) : t.getMonth() + 1,
                date: t.getDate(),
                fullDate: t.getDate() < 10 ? "0" + t.getDate() : t.getDate(),
                day: t.getDay(),
                hours: t.getHours(),
                fullHours: t.getHours() < 10 ? "0" + t.getHours() : t.getHours(),
                minutes: t.getMinutes(),
                fullMinutes: t.getMinutes() < 10 ? "0" + t.getMinutes() : t.getMinutes()
            }
        }, n.getDecade = function (t) {
            var e = 10 * Math.floor(t.getFullYear() / 10);
            return [e, e + 9]
        }, n.template = function (t, e) {
            return t.replace(/#\{([\w]+)\}/g, function (t, i) {
                return e[i] || 0 === e[i] ? e[i] : void 0
            })
        }, n.isSame = function (t, e, i) {
            if (!t || !e) return !1;
            var s = n.getParsedDate(t),
                a = n.getParsedDate(e),
                h = i ? i : "day",
                o = {
                    day: s.date == a.date && s.month == a.month && s.year == a.year,
                    month: s.month == a.month && s.year == a.year,
                    year: s.year == a.year
                };
            return o[h]
        }, n.less = function (t, e, i) {
            return t && e ? e.getTime() < t.getTime() : !1
        }, n.bigger = function (t, e, i) {
            return t && e ? e.getTime() > t.getTime() : !1
        }, n.getLeadingZeroNum = function (t) {
            return parseInt(t) < 10 ? "0" + t : t
        }, n.resetTime = function (t) {
            return "object" == typeof t ? (t = n.getParsedDate(t), new Date(t.year, t.month, t.date)) : void 0
        }, e.fn.datepicker = function (t) {
            return this.each(function () {
                if (e.data(this, o)) {
                    var i = e.data(this, o);
                    i.opts = e.extend(!0, i.opts, t), i.update()
                } else e.data(this, o, new m(this, t))
            })
        }, e.fn.datepicker.Constructor = m, e.fn.datepicker.language = {
            ru: {
                days: ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"],
                daysShort: ["Вос", "Пон", "Вто", "Сре", "Чет", "Пят", "Суб"],
                daysMin: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
                months: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
                monthsShort: ["Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек"],
                today: "Сегодня",
                clear: "Очистить",
                dateFormat: "dd.mm.yyyy",
                timeFormat: "hh:ii",
                firstDay: 1
            }
        }, e(function () {
            e(r).datepicker()
        })
    }(),
    function () {
        var t = {
                days: '<div class="datepicker--days datepicker--body"><div class="datepicker--days-names"></div><div class="datepicker--cells datepicker--cells-days"></div></div>',
                months: '<div class="datepicker--months datepicker--body"><div class="datepicker--cells datepicker--cells-months"></div></div>',
                years: '<div class="datepicker--years datepicker--body"><div class="datepicker--cells datepicker--cells-years"></div></div>'
            },
            s = e.fn.datepicker,
            a = s.Constructor;
        s.Body = function (t, i, s) {
            this.d = t, this.type = i, this.opts = s, this.$el = e(""), this.opts.onlyTimepicker || this.init()
        }, s.Body.prototype = {
            init: function () {
                this._buildBaseHtml(), this._render(), this._bindEvents()
            },
            _bindEvents: function () {
                this.$el.on("click", ".datepicker--cell", e.proxy(this._onClickCell, this))
            },
            _buildBaseHtml: function () {
                this.$el = e(t[this.type]).appendTo(this.d.$content), this.$names = e(".datepicker--days-names", this.$el), this.$cells = e(".datepicker--cells", this.$el)
            },
            _getDayNamesHtml: function (t, e, s, a) {
                return e = e != i ? e : t, s = s ? s : "", a = a != i ? a : 0, a > 7 ? s : 7 == e ? this._getDayNamesHtml(t, 0, s, ++a) : (s += '<div class="datepicker--day-name' + (this.d.isWeekend(e) ? " -weekend-" : "") + '">' + this.d.loc.daysMin[e] + "</div>", this._getDayNamesHtml(t, ++e, s, ++a))
            },
            _getCellContents: function (t, e) {
                var i = "datepicker--cell datepicker--cell-" + e,
                    s = new Date,
                    n = this.d,
                    h = a.resetTime(n.minRange),
                    o = a.resetTime(n.maxRange),
                    r = n.opts,
                    c = a.getParsedDate(t),
                    d = {},
                    l = c.date;
                switch (e) {
                    case "day":
                        n.isWeekend(c.day) && (i += " -weekend-"), c.month != this.d.parsedDate.month && (i += " -other-month-", r.selectOtherMonths || (i += " -disabled-"), r.showOtherMonths || (l = ""));
                        break;
                    case "month":
                        l = n.loc[n.opts.monthsField][c.month];
                        break;
                    case "year":
                        var u = n.curDecade;
                        l = c.year, (c.year < u[0] || c.year > u[1]) && (i += " -other-decade-", r.selectOtherYears || (i += " -disabled-"), r.showOtherYears || (l = ""))
                }
                return r.onRenderCell && (d = r.onRenderCell(t, e) || {}, l = d.html ? d.html : l, i += d.classes ? " " + d.classes : ""), r.range && (a.isSame(h, t, e) && (i += " -range-from-"), a.isSame(o, t, e) && (i += " -range-to-"), 1 == n.selectedDates.length && n.focused ? ((a.bigger(h, t) && a.less(n.focused, t) || a.less(o, t) && a.bigger(n.focused, t)) && (i += " -in-range-"), a.less(o, t) && a.isSame(n.focused, t) && (i += " -range-from-"), a.bigger(h, t) && a.isSame(n.focused, t) && (i += " -range-to-")) : 2 == n.selectedDates.length && a.bigger(h, t) && a.less(o, t) && (i += " -in-range-")), a.isSame(s, t, e) && (i += " -current-"), n.focused && a.isSame(t, n.focused, e) && (i += " -focus-"), n._isSelected(t, e) && (i += " -selected-"), (!n._isInRange(t, e) || d.disabled) && (i += " -disabled-"), {
                    html: l,
                    classes: i
                }
            },
            _getDaysHtml: function (t) {
                var e = a.getDaysCount(t),
                    i = new Date(t.getFullYear(), t.getMonth(), 1).getDay(),
                    s = new Date(t.getFullYear(), t.getMonth(), e).getDay(),
                    n = i - this.d.loc.firstDay,
                    h = 6 - s + this.d.loc.firstDay;
                n = 0 > n ? n + 7 : n, h = h > 6 ? h - 7 : h;
                for (var o, r, c = -n + 1, d = "", l = c, u = e + h; u >= l; l++) r = t.getFullYear(), o = t.getMonth(), d += this._getDayHtml(new Date(r, o, l));
                return d
            },
            _getDayHtml: function (t) {
                var e = this._getCellContents(t, "day");
                return '<div class="' + e.classes + '" data-date="' + t.getDate() + '" data-month="' + t.getMonth() + '" data-year="' + t.getFullYear() + '">' + e.html + "</div>"
            },
            _getMonthsHtml: function (t) {
                for (var e = "", i = a.getParsedDate(t), s = 0; 12 > s;) e += this._getMonthHtml(new Date(i.year, s)), s++;
                return e
            },
            _getMonthHtml: function (t) {
                var e = this._getCellContents(t, "month");
                return '<div class="' + e.classes + '" data-month="' + t.getMonth() + '">' + e.html + "</div>"
            },
            _getYearsHtml: function (t) {
                var e = (a.getParsedDate(t), a.getDecade(t)),
                    i = e[0] - 1,
                    s = "",
                    n = i;
                for (n; n <= e[1] + 1; n++) s += this._getYearHtml(new Date(n, 0));
                return s
            },
            _getYearHtml: function (t) {
                var e = this._getCellContents(t, "year");
                return '<div class="' + e.classes + '" data-year="' + t.getFullYear() + '">' + e.html + "</div>"
            },
            _renderTypes: {
                days: function () {
                    var t = this._getDayNamesHtml(this.d.loc.firstDay),
                        e = this._getDaysHtml(this.d.currentDate);
                    this.$cells.html(e), this.$names.html(t)
                },
                months: function () {
                    var t = this._getMonthsHtml(this.d.currentDate);
                    this.$cells.html(t)
                },
                years: function () {
                    var t = this._getYearsHtml(this.d.currentDate);
                    this.$cells.html(t)
                }
            },
            _render: function () {
                this.opts.onlyTimepicker || this._renderTypes[this.type].bind(this)()
            },
            _update: function () {
                var t, i, s, a = e(".datepicker--cell", this.$cells),
                    n = this;
                a.each(function (a, h) {
                    i = e(this), s = n.d._getDateFromCell(e(this)), t = n._getCellContents(s, n.d.cellType), i.attr("class", t.classes)
                })
            },
            show: function () {
                this.opts.onlyTimepicker || (this.$el.addClass("active"), this.acitve = !0)
            },
            hide: function () {
                this.$el.removeClass("active"), this.active = !1
            },
            _handleClick: function (t) {
                var e = t.data("date") || 1,
                    i = t.data("month") || 0,
                    s = t.data("year") || this.d.parsedDate.year,
                    a = this.d;
                if (a.view != this.opts.minView) return void a.down(new Date(s, i, e));
                var n = new Date(s, i, e),
                    h = this.d._isSelected(n, this.d.cellType);
                return h ? void a._handleAlreadySelectedDates.bind(a, h, n)() : void a._trigger("clickCell", n)
            },
            _onClickCell: function (t) {
                var i = e(t.target).closest(".datepicker--cell");
                i.hasClass("-disabled-") || this._handleClick.bind(this)(i)
            }
        }
    }(),
    function () {
        var t = '<div class="datepicker--nav-action" data-action="prev">#{prevHtml}</div><div class="datepicker--nav-title">#{title}</div><div class="datepicker--nav-action" data-action="next">#{nextHtml}</div>',
            i = '<div class="datepicker--buttons"></div>',
            s = '<span class="datepicker--button" data-action="#{action}">#{label}</span>',
            a = e.fn.datepicker,
            n = a.Constructor;
        a.Navigation = function (t, e) {
            this.d = t, this.opts = e, this.$buttonsContainer = "", this.init()
        }, a.Navigation.prototype = {
            init: function () {
                this._buildBaseHtml(), this._bindEvents()
            },
            _bindEvents: function () {
                this.d.$nav.on("click", ".datepicker--nav-action", e.proxy(this._onClickNavButton, this)), this.d.$nav.on("click", ".datepicker--nav-title", e.proxy(this._onClickNavTitle, this)), this.d.$datepicker.on("click", ".datepicker--button", e.proxy(this._onClickNavButton, this))
            },
            _buildBaseHtml: function () {
                this.opts.onlyTimepicker || this._render(), this._addButtonsIfNeed()
            },
            _addButtonsIfNeed: function () {
                this.opts.todayButton && this._addButton("today"), this.opts.clearButton && this._addButton("clear")
            },
            _render: function () {
                var i = this._getTitle(this.d.currentDate),
                    s = n.template(t, e.extend({
                        title: i
                    }, this.opts));
                this.d.$nav.html(s), "years" == this.d.view && e(".datepicker--nav-title", this.d.$nav).addClass("-disabled-"), this.setNavStatus()
            },
            _getTitle: function (t) {
                return this.d.formatDate(this.opts.navTitles[this.d.view], t)
            },
            _addButton: function (t) {
                this.$buttonsContainer.length || this._addButtonsContainer();
                var i = {
                        action: t,
                        label: this.d.loc[t]
                    },
                    a = n.template(s, i);
                e("[data-action=" + t + "]", this.$buttonsContainer).length || this.$buttonsContainer.append(a)
            },
            _addButtonsContainer: function () {
                this.d.$datepicker.append(i), this.$buttonsContainer = e(".datepicker--buttons", this.d.$datepicker)
            },
            setNavStatus: function () {
                if ((this.opts.minDate || this.opts.maxDate) && this.opts.disableNavWhenOutOfRange) {
                    var t = this.d.parsedDate,
                        e = t.month,
                        i = t.year,
                        s = t.date;
                    switch (this.d.view) {
                        case "days":
                            this.d._isInRange(new Date(i, e - 1, 1), "month") || this._disableNav("prev"), this.d._isInRange(new Date(i, e + 1, 1), "month") || this._disableNav("next");
                            break;
                        case "months":
                            this.d._isInRange(new Date(i - 1, e, s), "year") || this._disableNav("prev"), this.d._isInRange(new Date(i + 1, e, s), "year") || this._disableNav("next");
                            break;
                        case "years":
                            var a = n.getDecade(this.d.date);
                            this.d._isInRange(new Date(a[0] - 1, 0, 1), "year") || this._disableNav("prev"), this.d._isInRange(new Date(a[1] + 1, 0, 1), "year") || this._disableNav("next")
                    }
                }
            },
            _disableNav: function (t) {
                e('[data-action="' + t + '"]', this.d.$nav).addClass("-disabled-")
            },
            _activateNav: function (t) {
                e('[data-action="' + t + '"]', this.d.$nav).removeClass("-disabled-")
            },
            _onClickNavButton: function (t) {
                var i = e(t.target).closest("[data-action]"),
                    s = i.data("action");
                this.d[s]()
            },
            _onClickNavTitle: function (t) {
                return e(t.target).hasClass("-disabled-") ? void 0 : "days" == this.d.view ? this.d.view = "months" : void(this.d.view = "years")
            }
        }
    }(),
    function () {
        var t = '<div class="datepicker--time"><div class="datepicker--time-current">   <span class="datepicker--time-current-hours">#{hourVisible}</span>   <span class="datepicker--time-current-colon">:</span>   <span class="datepicker--time-current-minutes">#{minValue}</span></div><div class="datepicker--time-sliders">   <div class="datepicker--time-row">      <input type="range" name="hours" value="#{hourValue}" min="#{hourMin}" max="#{hourMax}" step="#{hourStep}"/>   </div>   <div class="datepicker--time-row">      <input type="range" name="minutes" value="#{minValue}" min="#{minMin}" max="#{minMax}" step="#{minStep}"/>   </div></div></div>',
            i = e.fn.datepicker,
            s = i.Constructor;
        i.Timepicker = function (t, e) {
            this.d = t, this.opts = e, this.init()
        }, i.Timepicker.prototype = {
            init: function () {
                var t = "input";
                this._setTime(this.d.date), this._buildHTML(), navigator.userAgent.match(/trident/gi) && (t = "change"), this.d.$el.on("selectDate", this._onSelectDate.bind(this)), this.$ranges.on(t, this._onChangeRange.bind(this)), this.$ranges.on("mouseup", this._onMouseUpRange.bind(this)), this.$ranges.on("mousemove focus ", this._onMouseEnterRange.bind(this)), this.$ranges.on("mouseout blur", this._onMouseOutRange.bind(this))
            },
            _setTime: function (t) {
                var e = s.getParsedDate(t);
                this._handleDate(t), this.hours = e.hours < this.minHours ? this.minHours : e.hours, this.minutes = e.minutes < this.minMinutes ? this.minMinutes : e.minutes
            },
            _setMinTimeFromDate: function (t) {
                this.minHours = t.getHours(), this.minMinutes = t.getMinutes(), this.d.lastSelectedDate && this.d.lastSelectedDate.getHours() > t.getHours() && (this.minMinutes = this.opts.minMinutes)
            },
            _setMaxTimeFromDate: function (t) {
                this.maxHours = t.getHours(), this.maxMinutes = t.getMinutes(), this.d.lastSelectedDate && this.d.lastSelectedDate.getHours() < t.getHours() && (this.maxMinutes = this.opts.maxMinutes)
            },
            _setDefaultMinMaxTime: function () {
                var t = 23,
                    e = 59,
                    i = this.opts;
                this.minHours = i.minHours < 0 || i.minHours > t ? 0 : i.minHours, this.minMinutes = i.minMinutes < 0 || i.minMinutes > e ? 0 : i.minMinutes, this.maxHours = i.maxHours < 0 || i.maxHours > t ? t : i.maxHours, this.maxMinutes = i.maxMinutes < 0 || i.maxMinutes > e ? e : i.maxMinutes
            },
            _validateHoursMinutes: function (t) {
                this.hours < this.minHours ? this.hours = this.minHours : this.hours > this.maxHours && (this.hours = this.maxHours), this.minutes < this.minMinutes ? this.minutes = this.minMinutes : this.minutes > this.maxMinutes && (this.minutes = this.maxMinutes)
            },
            _buildHTML: function () {
                var i = s.getLeadingZeroNum,
                    a = {
                        hourMin: this.minHours,
                        hourMax: i(this.maxHours),
                        hourStep: this.opts.hoursStep,
                        hourValue: this.hours,
                        hourVisible: i(this.displayHours),
                        minMin: this.minMinutes,
                        minMax: i(this.maxMinutes),
                        minStep: this.opts.minutesStep,
                        minValue: i(this.minutes)
                    },
                    n = s.template(t, a);
                this.$timepicker = e(n).appendTo(this.d.$datepicker), this.$ranges = e('[type="range"]', this.$timepicker), this.$hours = e('[name="hours"]', this.$timepicker), this.$minutes = e('[name="minutes"]', this.$timepicker), this.$hoursText = e(".datepicker--time-current-hours", this.$timepicker), this.$minutesText = e(".datepicker--time-current-minutes", this.$timepicker), this.d.ampm && (this.$ampm = e('<span class="datepicker--time-current-ampm">').appendTo(e(".datepicker--time-current", this.$timepicker)).html(this.dayPeriod), this.$timepicker.addClass("-am-pm-"))
            },
            _updateCurrentTime: function () {
                var t = s.getLeadingZeroNum(this.displayHours),
                    e = s.getLeadingZeroNum(this.minutes);
                this.$hoursText.html(t), this.$minutesText.html(e), this.d.ampm && this.$ampm.html(this.dayPeriod)
            },
            _updateRanges: function () {
                this.$hours.attr({
                    min: this.minHours,
                    max: this.maxHours
                }).val(this.hours), this.$minutes.attr({
                    min: this.minMinutes,
                    max: this.maxMinutes
                }).val(this.minutes)
            },
            _handleDate: function (t) {
                this._setDefaultMinMaxTime(), t && (s.isSame(t, this.d.opts.minDate) ? this._setMinTimeFromDate(this.d.opts.minDate) : s.isSame(t, this.d.opts.maxDate) && this._setMaxTimeFromDate(this.d.opts.maxDate)), this._validateHoursMinutes(t)
            },
            update: function () {
                this._updateRanges(), this._updateCurrentTime()
            },
            _getValidHoursFromDate: function (t, e) {
                var i = t,
                    a = t;
                t instanceof Date && (i = s.getParsedDate(t), a = i.hours);
                var n = e || this.d.ampm,
                    h = "am";
                if (n) switch (!0) {
                    case 0 == a:
                        a = 12;
                        break;
                    case 12 == a:
                        h = "pm";
                        break;
                    case a > 11:
                        a -= 12, h = "pm"
                }
                return {
                    hours: a,
                    dayPeriod: h
                }
            },
            set hours(t) {
                this._hours = t;
                var e = this._getValidHoursFromDate(t);
                this.displayHours = e.hours, this.dayPeriod = e.dayPeriod
            },
            get hours() {
                return this._hours
            },
            _onChangeRange: function (t) {
                var i = e(t.target),
                    s = i.attr("name");
                this.d.timepickerIsActive = !0, this[s] = i.val(), this._updateCurrentTime(), this.d._trigger("timeChange", [this.hours, this.minutes]), this._handleDate(this.d.lastSelectedDate), this.update()
            },
            _onSelectDate: function (t, e) {
                this._handleDate(e), this.update()
            },
            _onMouseEnterRange: function (t) {
                var i = e(t.target).attr("name");
                e(".datepicker--time-current-" + i, this.$timepicker).addClass("-focus-")
            },
            _onMouseOutRange: function (t) {
                var i = e(t.target).attr("name");
                this.d.inFocus || e(".datepicker--time-current-" + i, this.$timepicker).removeClass("-focus-")
            },
            _onMouseUpRange: function (t) {
                this.d.timepickerIsActive = !1
            }
        }
    }()
}(window, jQuery);