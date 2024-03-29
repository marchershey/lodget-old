/*! hotel-datepicker 4.4.1 - Copyright 2022 Benito Lopez (http://lopezb.com) - https://github.com/benitolopez/hotel-datepicker - MIT */
var HotelDatepicker = (function () {
    "use strict";
    function s(e, t) {
        (this._boundedEventHandlers = {}),
            (this.id = s.getNewId()),
            (t = t || {}),
            (this.format = t.format || "YYYY-MM-DD"),
            (this.infoFormat = t.infoFormat || this.format),
            (this.separator = t.separator || " - "),
            (this.startOfWeek = t.startOfWeek || "sunday"),
            (this.startDate = t.startDate || new Date()),
            (this.endDate = t.endDate || !1),
            (this.minNights = t.minNights || 1),
            (this.maxNights = t.maxNights || 0),
            (this.selectForward = t.selectForward || !1),
            (this.disabledDates = t.disabledDates || []),
            (this.noCheckInDates = t.noCheckInDates || []),
            (this.noCheckOutDates = t.noCheckOutDates || []),
            (this.disabledDaysOfWeek = t.disabledDaysOfWeek || []),
            (this.noCheckInDaysOfWeek = t.noCheckInDaysOfWeek || []),
            (this.noCheckOutDaysOfWeek = t.noCheckOutDaysOfWeek || []),
            (this.enableCheckout = t.enableCheckout || !1),
            (this.preventContainerClose = t.preventContainerClose || !1),
            (this.container = t.container || ""),
            (this.animationSpeed = t.animationSpeed || ".5s"),
            (this.hoveringTooltip = t.hoveringTooltip || !0),
            (this.autoClose = void 0 === t.autoClose || t.autoClose),
            (this.showTopbar = void 0 === t.showTopbar || t.showTopbar),
            (this.topbarPosition =
                "bottom" === t.topbarPosition ? "bottom" : "top"),
            (this.moveBothMonths = t.moveBothMonths || !1),
            (this.inline = t.inline || !1),
            (this.clearButton = Boolean(this.inline && t.clearButton)),
            (this.submitButton = Boolean(this.inline && t.submitButton)),
            (this.submitButtonName =
                this.submitButton && t.submitButtonName
                    ? t.submitButtonName
                    : ""),
            (this.i18n = t.i18n || {
                selected: "Your stay:",
                night: "Night",
                nights: "Nights",
                button: "Close",
                clearButton: "Clear",
                submitButton: "Submit",
                "checkin-disabled": "Check-in disabled",
                "checkout-disabled": "Check-out disabled",
                "day-names-short": [
                    "Sun",
                    "Mon",
                    "Tue",
                    "Wed",
                    "Thu",
                    "Fri",
                    "Sat",
                ],
                "day-names": [
                    "Sunday",
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Saturday",
                ],
                "month-names-short": [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                "month-names": [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December",
                ],
                "error-more": "Date range should not be more than 1 night",
                "error-more-plural":
                    "Date range should not be more than %d nights",
                "error-less": "Date range should not be less than 1 night",
                "error-less-plural":
                    "Date range should not be less than %d nights",
                "info-more": "Please select a date range of at least 1 night",
                "info-more-plural":
                    "Please select a date range of at least %d nights",
                "info-range":
                    "Please select a date range between %d and %d nights",
                "info-range-equal": "Please select a date range of %d nights",
                "info-default": "Please select a date range",
            }),
            (this.getValue =
                t.getValue ||
                function () {
                    return e.value;
                }),
            (this.setValue =
                t.setValue ||
                function (t) {
                    e.value = t;
                }),
            (this.onDayClick = void 0 !== t.onDayClick && t.onDayClick),
            (this.onOpenDatepicker =
                void 0 !== t.onOpenDatepicker && t.onOpenDatepicker),
            (this.onSelectRange =
                void 0 !== t.onSelectRange && t.onSelectRange),
            (this.input = e),
            this.init();
    }
    var t = 0;
    return (
        (s.prototype.addBoundedListener = function (t, e, s, i) {
            t in this._boundedEventHandlers ||
                (this._boundedEventHandlers[t] = {}),
                e in this._boundedEventHandlers[t] ||
                    (this._boundedEventHandlers[t][e] = []);
            s = s.bind(this);
            this._boundedEventHandlers[t][e].push([s, i]),
                t.addEventListener(e, s, i);
        }),
        (s.prototype.removeAllBoundedListeners = function (t, e) {
            if (t in this._boundedEventHandlers) {
                var s = this._boundedEventHandlers[t];
                if (e in s)
                    for (var i = s[e], a = i.length; a--; ) {
                        var n = i[a];
                        t.removeEventListener(e, n[0], n[1]);
                    }
            }
        }),
        (s.getNewId = function () {
            return ++t;
        }),
        (s.prototype.setFechaI18n = function () {
            fecha.setGlobalDateI18n({
                dayNamesShort: this.i18n["day-names-short"],
                dayNames: this.i18n["day-names"],
                monthNamesShort: this.i18n["month-names-short"],
                monthNames: this.i18n["month-names"],
            });
        }),
        (s.prototype.getWeekDayNames = function () {
            var t = "";
            if ("monday" === this.startOfWeek)
                for (var e = 0; e < 7; e++)
                    t +=
                        '<th class="datepicker__week-name">' +
                        this.lang("day-names-short")[(1 + e) % 7] +
                        "</th>";
            else
                for (var s = 0; s < 7; s++)
                    t +=
                        '<th class="datepicker__week-name">' +
                        this.lang("day-names-short")[s] +
                        "</th>";
            return t;
        }),
        (s.prototype.getMonthDom = function (t) {
            return document.getElementById(this.getMonthTableId(t));
        }),
        (s.prototype.getMonthName = function (t) {
            return this.lang("month-names")[t];
        }),
        (s.prototype.getDatepickerId = function () {
            return "datepicker-" + this.generateId();
        }),
        (s.prototype.getMonthTableId = function (t) {
            return "month-" + t + "-" + this.generateId();
        }),
        (s.prototype.getCloseButtonId = function () {
            return "close-" + this.generateId();
        }),
        (s.prototype.getClearButtonId = function () {
            return "clear-" + this.generateId();
        }),
        (s.prototype.getSubmitButtonId = function () {
            return "submit-" + this.generateId();
        }),
        (s.prototype.getTooltipId = function () {
            return "tooltip-" + this.generateId();
        }),
        (s.prototype.getNextMonth = function (t) {
            t = new Date(t.valueOf());
            return new Date(t.setMonth(t.getMonth() + 1, 1));
        }),
        (s.prototype.getPrevMonth = function (t) {
            t = new Date(t.valueOf());
            return new Date(t.setMonth(t.getMonth() - 1, 1));
        }),
        (s.prototype.getDateString = function (t, e) {
            return (
                void 0 === e && (e = this.format),
                this.setFechaI18n(),
                fecha.format(t, e)
            );
        }),
        (s.prototype.parseDate = function (t, e) {
            return (
                void 0 === e && (e = this.format),
                this.setFechaI18n(),
                fecha.parse(t, e)
            );
        }),
        (s.prototype.init = function () {
            (this.parent = this.container || this.input.parentElement),
                (this.start = !1),
                (this.end = !1),
                (this.minDays = 1 < this.minNights ? this.minNights + 1 : 2),
                (this.maxDays = 0 < this.maxNights ? this.maxNights + 1 : 0),
                this.startDate &&
                    "string" == typeof this.startDate &&
                    (this.startDate = this.parseDate(this.startDate)),
                this.endDate &&
                    "string" == typeof this.endDate &&
                    (this.endDate = this.parseDate(this.endDate)),
                this.isTouchDevice() && (this.hoveringTooltip = !1),
                (this.isOpen = !1),
                (this.changed = !1),
                this.createDom();
            var t = new Date();
            this.startDate &&
                this.compareMonth(t, this.startDate) < 0 &&
                (t = new Date(this.startDate.getTime())),
                this.endDate &&
                    0 < this.compareMonth(this.getNextMonth(t), this.endDate) &&
                    (t = new Date(this.getPrevMonth(this.endDate.getTime()))),
                0 < this.disabledDates.length && this.parseDisabledDates(),
                0 < this.disabledDaysOfWeek.length && this.getDisabledDays(),
                this.showMonth(t, 1),
                this.showMonth(this.getNextMonth(t), 2),
                this.topBarDefaultText(),
                this.inline &&
                    (this.openDatepicker(),
                    this.clearButton &&
                        (document.getElementById(
                            this.getClearButtonId()
                        ).disabled = !0),
                    this.submitButton &&
                        (document.getElementById(
                            this.getSubmitButtonId()
                        ).disabled = !0)),
                this.addListeners(),
                (this.isFirstDisabledDate = 0),
                (this.lastDisabledDate = !1);
        }),
        (s.prototype.addListeners = function () {
            for (
                var e = this,
                    t = this.datepicker.getElementsByClassName(
                        "datepicker__month-button--next"
                    ),
                    s = 0;
                s < t.length;
                s++
            )
                t[s].addEventListener("click", function (t) {
                    return e.goToNextMonth(t);
                });
            for (
                var i = this.datepicker.getElementsByClassName(
                        "datepicker__month-button--prev"
                    ),
                    a = 0;
                a < i.length;
                a++
            )
                i[a].addEventListener("click", function (t) {
                    return e.goToPreviousMonth(t);
                });
            this.addBoundedListener(this.input, "click", function (t) {
                return e.openDatepicker(t);
            }),
                this.showTopbar &&
                    !this.inline &&
                    document
                        .getElementById(this.getCloseButtonId())
                        .addEventListener("click", function (t) {
                            return e.closeDatepicker(t);
                        }),
                this.showTopbar &&
                    this.clearButton &&
                    document
                        .getElementById(this.getClearButtonId())
                        .addEventListener("click", function (t) {
                            return e.clearDatepicker(t);
                        }),
                window.addEventListener("resize", function (t) {
                    return e.onResizeDatepicker(t);
                }),
                this.datepicker.addEventListener("mouseover", function (t) {
                    return e.datepickerHover(t);
                }),
                this.datepicker.addEventListener("mouseout", function (t) {
                    return e.datepickerMouseOut(t);
                }),
                this.addBoundedListener(this.input, "change", function () {
                    return e.checkAndSetDefaultValue();
                });
        }),
        (s.prototype.generateId = function () {
            return this.input.id || this.id;
        }),
        (s.prototype.createDom = function () {
            var t = this.createDatepickerDomString();
            this.parent.insertAdjacentHTML("beforeend", t),
                (this.datepicker = document.getElementById(
                    this.getDatepickerId()
                ));
        }),
        (s.prototype.createDatepickerDomString = function () {
            var t = this.inline ? " datepicker--inline" : "",
                e =
                    (this.showTopbar &&
                        "bottom" === this.topbarPosition &&
                        (t += " datepicker--topbar-bottom"),
                    this.inline ||
                        (t += " datepicker--topbar-has-close-button"),
                    this.clearButton &&
                        (t += " datepicker--topbar-has-clear-button"),
                    this.submitButton &&
                        (t += " datepicker--topbar-has-submit-button"),
                    this.inline ? "" : ' style="display:none"'),
                s =
                    '<div id="' +
                    this.getDatepickerId() +
                    '"' +
                    e +
                    ' class="datepicker datepicker--closed' +
                    t +
                    '">',
                e = ((s += '<div class="datepicker__inner">'), "");
            this.showTopbar &&
                ((e +=
                    '<div class="datepicker__topbar"><div class="datepicker__info datepicker__info--selected"><span class="datepicker__info datepicker__info--selected-label">' +
                    this.lang("selected") +
                    ' </span> <strong class="datepicker__info-text datepicker__info-text--start-day">...</strong> <span class="datepicker__info-text datepicker__info--separator">' +
                    this.separator +
                    '</span> <strong class="datepicker__info-text datepicker__info-text--end-day">...</strong> <em class="datepicker__info-text datepicker__info-text--selected-days">(<span></span>)</em></div><div class="datepicker__info datepicker__info--feedback"></div>'),
                this.inline ||
                    (e +=
                        '<button type="button" id="' +
                        this.getCloseButtonId() +
                        '" class="datepicker__close-button">' +
                        this.lang("button") +
                        "</button>"),
                (this.clearButton || this.submitButton) &&
                    (e += '<div class="datepicker__buttons">'),
                this.clearButton &&
                    (e +=
                        '<button type="button" id="' +
                        this.getClearButtonId() +
                        '" class="datepicker__clear-button">' +
                        this.lang("clearButton") +
                        "</button>"),
                this.submitButton &&
                    (e +=
                        '<input type="submit" id="' +
                        this.getSubmitButtonId() +
                        '" class="datepicker__submit-button" value="' +
                        this.lang("submitButton") +
                        '" name="' +
                        this.submitButtonName +
                        '">'),
                (this.clearButton || this.submitButton) && (e += "</div>"),
                (e += "</div>")),
                this.showTopbar && "top" === this.topbarPosition && (s += e),
                (s += '<div class="datepicker__months">');
            for (var i = 1; i <= 2; i++)
                s +=
                    '<table id="' +
                    this.getMonthTableId(i) +
                    '" class="datepicker__month datepicker__month--month' +
                    i +
                    '"><thead><tr class="datepicker__month-caption"><th><span class="datepicker__month-button datepicker__month-button--prev" month="' +
                    i +
                    '">&lt;</span></th><th colspan="5" class="datepicker__month-name"></th><th><span class="datepicker__month-button datepicker__month-button--next" month="' +
                    i +
                    '">&gt;</span></th></tr><tr class="datepicker__week-days">' +
                    this.getWeekDayNames(i) +
                    "</tr></thead><tbody></tbody></table>";
            return (
                (s += "</div>"),
                this.showTopbar && "bottom" === this.topbarPosition && (s += e),
                (s =
                    (s +=
                        '<div style="display:none" id="' +
                        this.getTooltipId() +
                        '" class="datepicker__tooltip"></div>') +
                    "</div>" +
                    "</div>")
            );
        }),
        (s.prototype.showMonth = function (t, e) {
            t.setHours(0, 0, 0, 0);
            var s = this.getMonthName(t.getMonth()),
                i = this.getMonthDom(e),
                a = i.getElementsByClassName("datepicker__month-name")[0],
                i = i.getElementsByTagName("tbody")[0];
            (a.textContent = s + " " + t.getFullYear()),
                this.emptyElement(i),
                i.insertAdjacentHTML("beforeend", this.createMonthDomString(t)),
                this.updateSelectableRange(),
                (this["month" + e] = t);
        }),
        (s.prototype.createMonthDomString = function (t) {
            var e = this,
                s = [],
                i = "",
                a = (t.setDate(1), t.getDay()),
                n = t.getMonth();
            if (0 < (a = 0 === a && "monday" === this.startOfWeek ? 7 : a))
                for (var o = a; 0 < o; o--) {
                    var h = new Date(t.getTime() - 864e5 * o),
                        r = e.isValidDate(h.getTime());
                    ((e.startDate && e.compareDay(h, e.startDate) < 0) ||
                        (e.endDate && 0 < e.compareDay(h, e.endDate))) &&
                        (r = !1),
                        s.push({
                            date: h,
                            type: "lastMonth",
                            day: h.getDate(),
                            time: h.getTime(),
                            valid: r,
                        });
                }
            for (var d = 0; d < 40; d++) {
                var l = e.addDays(t, d);
                (r = e.isValidDate(l.getTime())),
                    ((e.startDate && e.compareDay(l, e.startDate) < 0) ||
                        (e.endDate && 0 < e.compareDay(l, e.endDate))) &&
                        (r = !1),
                    s.push({
                        date: l,
                        type: l.getMonth() === n ? "visibleMonth" : "nextMonth",
                        day: l.getDate(),
                        time: l.getTime(),
                        valid: r,
                    });
            }
            for (var c = 0; c < 6 && "nextMonth" !== s[7 * c].type; c++) {
                i += '<tr class="datepicker__week-row">';
                for (var p = 0; p < 7; p++) {
                    var m = s[7 * c + ("monday" === e.startOfWeek ? p + 1 : p)],
                        u = e.getDayClasses(m),
                        y = "",
                        u =
                            (e.hasClass(
                                m,
                                "datepicker__month-day--no-checkin"
                            ) && (y = e.i18n["checkin-disabled"]),
                            e.hasClass(
                                m,
                                "datepicker__month-day--no-checkout"
                            ) &&
                                (y && (y += ". "),
                                (y += e.i18n["checkout-disabled"])),
                            {
                                daytype: m.type,
                                time: m.time,
                                class: u.join(" "),
                            });
                    y && (u.title = y),
                        (i +=
                            '<td class="' +
                            u.class +
                            '" ' +
                            e.printAttributes(u) +
                            ">" +
                            m.day +
                            "</td>");
                }
                i += "</tr>";
            }
            return i;
        }),
        (s.prototype.openDatepicker = function () {
            var e = this;
            this.isOpen ||
                (this.removeClass(this.datepicker, "datepicker--closed"),
                this.addClass(this.datepicker, "datepicker--open"),
                this.checkAndSetDefaultValue(),
                this.inline ||
                    this.slideDown(this.datepicker, this.animationSpeed),
                (this.isOpen = !0),
                this.showSelectedDays(),
                this.disableNextPrevButtons(),
                this.addBoundedListener(document, "click", function (t) {
                    return e.documentClick(t);
                }),
                this.onOpenDatepicker && this.onOpenDatepicker());
        }),
        (s.prototype.closeDatepicker = function () {
            var t;
            this.isOpen &&
                !this.inline &&
                (this.removeClass(this.datepicker, "datepicker--open"),
                this.addClass(this.datepicker, "datepicker--closed"),
                this.slideUp(this.datepicker, this.animationSpeed),
                (this.isOpen = !1),
                (t = document.createEvent("Event")).initEvent(
                    "afterClose",
                    !0,
                    !0
                ),
                this.input.dispatchEvent(t),
                this.removeAllBoundedListeners(document, "click"));
        }),
        (s.prototype.autoclose = function () {
            this.autoClose &&
                this.changed &&
                this.isOpen &&
                this.start &&
                this.end &&
                !this.inline &&
                this.closeDatepicker();
        }),
        (s.prototype.documentClick = function (t) {
            this.parent.contains(t.target) || t.target === this.input
                ? "td" === t.target.tagName.toLowerCase() &&
                  this.dayClicked(t.target)
                : this.preventContainerClose || this.closeDatepicker();
        }),
        (s.prototype.datepickerHover = function (t) {
            t.target.tagName &&
                "td" === t.target.tagName.toLowerCase() &&
                this.dayHovering(t.target);
        }),
        (s.prototype.datepickerMouseOut = function (t) {
            t.target.tagName &&
                "td" === t.target.tagName.toLowerCase() &&
                (document.getElementById(this.getTooltipId()).style.display =
                    "none");
        }),
        (s.prototype.onResizeDatepicker = function () {
            this.checkAndSetDefaultValue(!0);
        }),
        (s.prototype.getDayClasses = function (t) {
            var e,
                s,
                i,
                a =
                    this.getDateString(t.time) ===
                    this.getDateString(new Date()),
                n =
                    this.getDateString(t.time) ===
                    this.getDateString(this.startDate),
                o = !1,
                h = !1,
                r = !1,
                d = !1,
                l = !1,
                c = !1;
            return (
                (!t.valid && "visibleMonth" !== t.type) ||
                    ((e = this.getDateString(t.time, "YYYY-MM-DD")),
                    0 < this.disabledDates.length &&
                        ((i = this.getClosestDisabledDates(t.date))[0] &&
                            i[1] &&
                            this.compareDay(t.date, i[0]) &&
                            0 < this.countDays(i[0], i[1]) - 2 &&
                            ((s = this.countDays(i[1], t.date) - 1),
                            (i = this.countDays(t.date, i[0]) - 1),
                            ((this.selectForward && s < this.minDays) ||
                                (!this.selectForward &&
                                    s < this.minDays &&
                                    i < this.minDays)) &&
                                (t.valid = !1),
                            !t.valid &&
                                this.enableCheckout &&
                                2 == s &&
                                (c = !0)),
                        -1 < this.disabledDates.indexOf(e)
                            ? ((o = !(t.valid = !1)),
                              this.isFirstDisabledDate++,
                              (this.lastDisabledDate = t.date))
                            : (this.isFirstDisabledDate = 0),
                        t.valid &&
                            this.lastDisabledDate &&
                            0 <
                                this.compareDay(
                                    t.date,
                                    this.lastDisabledDate
                                ) &&
                            2 ===
                                this.countDays(t.date, this.lastDisabledDate) &&
                            (l = !0)),
                    0 < this.disabledDaysOfWeek.length &&
                        -1 <
                            this.disabledDaysOfWeek.indexOf(
                                fecha.format(t.time, "dddd")
                            ) &&
                        (d = !(t.valid = !1)),
                    0 < this.noCheckInDates.length &&
                        -1 < this.noCheckInDates.indexOf(e) &&
                        (l = !(h = !0)),
                    0 < this.noCheckOutDates.length &&
                        -1 < this.noCheckOutDates.indexOf(e) &&
                        (r = !0),
                    0 < this.noCheckInDaysOfWeek.length &&
                        -1 <
                            this.noCheckInDaysOfWeek.indexOf(
                                fecha.format(t.time, "dddd")
                            ) &&
                        (l = !(h = !0)),
                    0 < this.noCheckOutDaysOfWeek.length &&
                        -1 <
                            this.noCheckOutDaysOfWeek.indexOf(
                                fecha.format(t.time, "dddd")
                            ) &&
                        (r = !0)),
                [
                    "datepicker__month-day",
                    "datepicker__month-day--" + t.type,
                    "datepicker__month-day--" + (t.valid ? "valid" : "invalid"),
                    a ? "datepicker__month-day--today" : "",
                    o ? "datepicker__month-day--disabled" : "",
                    o && this.enableCheckout && 1 === this.isFirstDisabledDate
                        ? "datepicker__month-day--checkout-enabled"
                        : "",
                    c ? "datepicker__month-day--before-disabled-date" : "",
                    n || l ? "datepicker__month-day--checkin-only" : "",
                    h ? "datepicker__month-day--no-checkin" : "",
                    r ? "datepicker__month-day--no-checkout" : "",
                    d ? "datepicker__month-day--day-of-week-disabled" : "",
                ]
            );
        }),
        (s.prototype.checkAndSetDayClasses = function () {
            for (
                var t = this,
                    e = this.datepicker.getElementsByTagName("td"),
                    s = 0;
                s < e.length;
                s++
            ) {
                var i = parseInt(e[s].getAttribute("time"), 10),
                    a = new Date(i),
                    n = e[s].getAttribute("daytype"),
                    o = void 0,
                    o = t.isValidDate(a.getTime()),
                    n =
                        (((t.startDate && t.compareDay(a, t.startDate) < 0) ||
                            (t.endDate && 0 < t.compareDay(a, t.endDate))) &&
                            (o = !1),
                        {
                            date: a,
                            type: n,
                            day: a.getDate(),
                            time: i,
                            valid: o,
                        }),
                    a = t.getDayClasses(n);
                e[s].className = a.join(" ");
            }
        }),
        (s.prototype.checkAndSetDefaultValue = function (t) {
            void 0 === t && (t = !1);
            var e,
                s = this.getValue(),
                s = s ? s.split(this.separator) : "";
            s && 2 <= s.length
                ? ((e = this.format),
                  (this.changed = !1),
                  this.setDateRange(
                      this.parseDate(s[0], e),
                      this.parseDate(s[1], e),
                      t
                  ),
                  (this.changed = !0))
                : this.showTopbar &&
                  ((this.datepicker.getElementsByClassName(
                      "datepicker__info--selected"
                  )[0].style.display = "none"),
                  t &&
                      ((s = new Date()),
                      this.startDate &&
                          this.compareMonth(s, this.startDate) < 0 &&
                          (s = new Date(this.startDate.getTime())),
                      this.endDate &&
                          0 <
                              this.compareMonth(
                                  this.getNextMonth(s),
                                  this.endDate
                              ) &&
                          (s = new Date(
                              this.getPrevMonth(this.endDate.getTime())
                          )),
                      this.start && !this.end && this.clearSelection(),
                      this.showMonth(s, 1),
                      this.showMonth(this.getNextMonth(s), 2)));
        }),
        (s.prototype.setDateRange = function (t, e, s) {
            void 0 === s && (s = !1),
                t.getTime() > e.getTime() &&
                    ((i = e), (e = t), (t = i), (i = null));
            var i = !0;
            if (
                !(i =
                    (this.startDate &&
                        this.compareDay(t, this.startDate) < 0) ||
                    (this.endDate && 0 < this.compareDay(e, this.endDate))
                        ? !1
                        : i)
            )
                return (
                    this.showMonth(this.startDate, 1),
                    this.showMonth(this.getNextMonth(this.startDate), 2),
                    this.showSelectedDays(),
                    void this.disableNextPrevButtons()
                );
            t.setTime(t.getTime() + 432e5),
                e.setTime(e.getTime() + 432e5),
                (this.start = t.getTime()),
                (this.end = e.getTime()),
                0 < this.compareDay(t, e) &&
                    0 === this.compareMonth(t, e) &&
                    (e = this.getNextMonth(t)),
                0 === this.compareMonth(t, e) && (e = this.getNextMonth(t)),
                this.showMonth(t, 1),
                this.showMonth(e, 2),
                this.showSelectedDays(),
                this.disableNextPrevButtons(),
                this.checkSelection(),
                this.showSelectedInfo(),
                s || this.autoclose();
        }),
        (s.prototype.showSelectedDays = function () {
            var t = this;
            if (this.start || this.end)
                for (
                    var e = this.datepicker.getElementsByTagName("td"), s = 0;
                    s < e.length;
                    s++
                ) {
                    var i = parseInt(e[s].getAttribute("time"), 10);
                    (t.start && t.end && t.end >= i && t.start <= i) ||
                    (t.start &&
                        !t.end &&
                        t.getDateString(t.start, "YYYY-MM-DD") ===
                            t.getDateString(i, "YYYY-MM-DD"))
                        ? t.addClass(e[s], "datepicker__month-day--selected")
                        : t.removeClass(
                              e[s],
                              "datepicker__month-day--selected"
                          ),
                        t.start &&
                        t.getDateString(t.start, "YYYY-MM-DD") ===
                            t.getDateString(i, "YYYY-MM-DD")
                            ? t.addClass(
                                  e[s],
                                  "datepicker__month-day--first-day-selected"
                              )
                            : t.removeClass(
                                  e[s],
                                  "datepicker__month-day--first-day-selected"
                              ),
                        t.end &&
                        t.getDateString(t.end, "YYYY-MM-DD") ===
                            t.getDateString(i, "YYYY-MM-DD")
                            ? t.addClass(
                                  e[s],
                                  "datepicker__month-day--last-day-selected"
                              )
                            : t.removeClass(
                                  e[s],
                                  "datepicker__month-day--last-day-selected"
                              );
                }
        }),
        (s.prototype.showSelectedInfo = function () {
            var t, e, s, i, a, n, o;
            this.showTopbar
                ? ((n = (a = this.datepicker.getElementsByClassName(
                      "datepicker__info--selected"
                  )[0]).getElementsByClassName(
                      "datepicker__info-text--start-day"
                  )[0]),
                  (o = a.getElementsByClassName(
                      "datepicker__info-text--end-day"
                  )[0]),
                  (t = a.getElementsByClassName(
                      "datepicker__info-text--selected-days"
                  )[0]),
                  (e = document.getElementById(this.getCloseButtonId())),
                  (s = document.getElementById(this.getClearButtonId())),
                  (i = document.getElementById(this.getSubmitButtonId())),
                  (n.textContent = "..."),
                  (o.textContent = "..."),
                  (t.style.display = "none"),
                  this.start &&
                      ((a.style.display = ""),
                      (n.textContent = this.getDateString(
                          new Date(parseInt(this.start, 10)),
                          this.infoFormat
                      )),
                      this.inline && this.clearButton && (s.disabled = !1)),
                  this.end &&
                      (o.textContent = this.getDateString(
                          new Date(parseInt(this.end, 10)),
                          this.infoFormat
                      )),
                  this.start && this.end
                      ? ((n =
                            1 == (a = this.countDays(this.end, this.start) - 1)
                                ? a + " " + this.lang("night")
                                : a + " " + this.lang("nights")),
                        (o =
                            this.getDateString(new Date(this.start)) +
                            this.separator +
                            this.getDateString(new Date(this.end))),
                        (t.style.display = ""),
                        (t.firstElementChild.textContent = n),
                        this.inline
                            ? this.submitButton && (i.disabled = !1)
                            : (e.disabled = !1),
                        this.setValue(
                            o,
                            this.getDateString(new Date(this.start)),
                            this.getDateString(new Date(this.end))
                        ),
                        (this.changed = !0))
                      : this.inline
                      ? (!this.clearButton ||
                            this.start ||
                            this.end ||
                            (s.disabled = !0),
                        this.submitButton && (i.disabled = !0))
                      : (e.disabled = !0))
                : this.start &&
                  this.end &&
                  ((a =
                      this.getDateString(new Date(this.start)) +
                      this.separator +
                      this.getDateString(new Date(this.end))),
                  this.setValue(
                      a,
                      this.getDateString(new Date(this.start)),
                      this.getDateString(new Date(this.end))
                  ),
                  (this.changed = !0));
        }),
        (s.prototype.dayClicked = function (t) {
            if (!this.hasClass(t, "datepicker__month-day--invalid")) {
                var e = (this.start && this.end) || (!this.start && !this.end),
                    s = parseInt(t.getAttribute("time"), 10);
                if (e) {
                    if (this.hasClass(t, "datepicker__month-day--no-checkin"))
                        return;
                } else if (this.start) {
                    if (
                        this.start > s &&
                        this.hasClass(t, "datepicker__month-day--no-checkin")
                    )
                        return;
                    var i = this.datepicker.querySelectorAll(
                        'td[time="' + this.start + '"]'
                    )[0];
                    if (
                        i &&
                        this.hasClass(
                            i,
                            "datepicker__month-day--no-checkout"
                        ) &&
                        this.start > s
                    )
                        return;
                    if (
                        this.hasClass(
                            t,
                            "datepicker__month-day--no-checkout"
                        ) &&
                        s > this.start
                    )
                        return;
                }
                this.addClass(t, "datepicker__month-day--selected"),
                    e
                        ? ((this.start = s), (this.end = !1))
                        : this.start && (this.end = s),
                    this.start &&
                        this.end &&
                        this.start > this.end &&
                        ((i = this.end),
                        (this.end = this.start),
                        (this.start = i)),
                    (this.start = parseInt(this.start, 10)),
                    (this.end = parseInt(this.end, 10)),
                    this.clearHovering(),
                    this.start && !this.end && this.dayHovering(t),
                    this.updateSelectableRange(),
                    this.checkSelection(),
                    this.showSelectedInfo(),
                    this.start && this.end && this.checkAndSetDayClasses(),
                    this.showSelectedDays(),
                    this.autoclose(),
                    this.onDayClick && this.onDayClick(),
                    this.end && this.onSelectRange && this.onSelectRange();
            }
        }),
        (s.prototype.isValidDate = function (t) {
            if (
                ((t = parseInt(t, 10)),
                (this.startDate && this.compareDay(t, this.startDate) < 0) ||
                    (this.endDate && 0 < this.compareDay(t, this.endDate)))
            )
                return !1;
            if (this.start && !this.end) {
                if (
                    (0 < this.maxDays &&
                        this.countDays(t, this.start) > this.maxDays) ||
                    (0 < this.minDays &&
                        1 < this.countDays(t, this.start) &&
                        this.countDays(t, this.start) < this.minDays)
                )
                    return !1;
                if (this.selectForward && t < this.start) return !1;
                if (0 < this.disabledDates.length) {
                    var e = this.getClosestDisabledDates(
                        new Date(parseInt(this.start, 10))
                    );
                    if (e[0] && this.compareDay(t, e[0]) <= 0) return !1;
                    if (e[1] && 0 <= this.compareDay(t, e[1])) return !1;
                }
                if (0 < this.disabledDaysOfWeek.length) {
                    e = this.getClosestDisabledDays(
                        new Date(parseInt(this.start, 10))
                    );
                    if (e[0] && this.compareDay(t, e[0]) <= 0) return !1;
                    if (e[1] && 0 <= this.compareDay(t, e[1])) return !1;
                }
            }
            return !0;
        }),
        (s.prototype.checkSelection = function () {
            var t = this,
                e = this.countDays(this.end, this.start),
                s =
                    !!this.showTopbar &&
                    this.datepicker.getElementsByClassName(
                        "datepicker__info--feedback"
                    )[0];
            if (this.maxDays && e > this.maxDays) {
                (this.start = !1), (this.end = !1);
                for (
                    var i = this.datepicker.getElementsByTagName("td"), a = 0;
                    a < i.length;
                    a++
                )
                    t.removeClass(i[a], "datepicker__month-day--selected"),
                        t.removeClass(
                            i[a],
                            "datepicker__month-day--first-day-selected"
                        ),
                        t.removeClass(
                            i[a],
                            "datepicker__month-day--last-day-selected"
                        );
                this.showTopbar &&
                    ((n = this.maxDays - 1),
                    this.topBarErrorText(s, "error-more", n));
            } else if (this.minDays && e < this.minDays) {
                (this.start = !1), (this.end = !1);
                for (
                    var n,
                        o = this.datepicker.getElementsByTagName("td"),
                        h = 0;
                    h < o.length;
                    h++
                )
                    t.removeClass(o[h], "datepicker__month-day--selected"),
                        t.removeClass(
                            o[h],
                            "datepicker__month-day--first-day-selected"
                        ),
                        t.removeClass(
                            o[h],
                            "datepicker__month-day--last-day-selected"
                        );
                this.showTopbar &&
                    ((n = this.minDays - 1),
                    this.topBarErrorText(s, "error-less", n));
            } else
                this.start || this.end
                    ? this.showTopbar &&
                      (this.removeClass(s, "datepicker__info--error"),
                      this.removeClass(s, "datepicker__info--help"))
                    : this.showTopbar &&
                      (this.removeClass(s, "datepicker__info--error"),
                      this.addClass(s, "datepicker__info--help"));
        }),
        (s.prototype.addDays = function (t, e) {
            t = new Date(t);
            return t.setDate(t.getDate() + e), t;
        }),
        (s.prototype.substractDays = function (t, e) {
            t = new Date(t);
            return t.setDate(t.getDate() - e), t;
        }),
        (s.prototype.countDays = function (t, e) {
            return Math.abs(this.daysFrom1970(t) - this.daysFrom1970(e)) + 1;
        }),
        (s.prototype.compareDay = function (t, e) {
            t =
                parseInt(this.getDateString(t, "YYYYMMDD"), 10) -
                parseInt(this.getDateString(e, "YYYYMMDD"), 10);
            return 0 < t ? 1 : 0 == t ? 0 : -1;
        }),
        (s.prototype.compareMonth = function (t, e) {
            t =
                parseInt(this.getDateString(t, "YYYYMM"), 10) -
                parseInt(this.getDateString(e, "YYYYMM"), 10);
            return 0 < t ? 1 : 0 == t ? 0 : -1;
        }),
        (s.prototype.daysFrom1970 = function (t) {
            return Math.round(this.toLocalTimestamp(t) / 864e5);
        }),
        (s.prototype.toLocalTimestamp = function (t) {
            return (
                "string" !=
                    typeof (t =
                        "object" == typeof t && t.getTime ? t.getTime() : t) ||
                    t.match(/\d{13}/) ||
                    (t = this.parseDate(t).getTime()),
                (t =
                    parseInt(t, 10) - 60 * new Date().getTimezoneOffset() * 1e3)
            );
        }),
        (s.prototype.printAttributes = function (t) {
            var e,
                s = t,
                i = "";
            for (e in t)
                Object.prototype.hasOwnProperty.call(s, e) &&
                    (i += e + '="' + s[e] + '" ');
            return i;
        }),
        (s.prototype.goToNextMonth = function (t) {
            var t = t.target.getAttribute("month"),
                e = 1 < t,
                s = e ? this.month2 : this.month1,
                s = this.getNextMonth(s);
            (!this.isSingleMonth() &&
                !e &&
                0 <= this.compareMonth(s, this.month2)) ||
                this.isMonthOutOfRange(s) ||
                (this.moveBothMonths && e && this.showMonth(this.month2, 1),
                this.showMonth(s, t),
                this.showSelectedDays(),
                this.disableNextPrevButtons());
        }),
        (s.prototype.goToPreviousMonth = function (t) {
            var t = t.target.getAttribute("month"),
                e = 1 < t,
                s = e ? this.month2 : this.month1,
                s = this.getPrevMonth(s);
            (e && this.compareMonth(s, this.month1) <= 0) ||
                this.isMonthOutOfRange(s) ||
                (this.moveBothMonths && !e && this.showMonth(this.month1, 2),
                this.showMonth(s, t),
                this.showSelectedDays(),
                this.disableNextPrevButtons());
        }),
        (s.prototype.isSingleMonth = function () {
            return !this.isVisible(this.getMonthDom(2));
        }),
        (s.prototype.isMonthOutOfRange = function (t) {
            t = new Date(t.valueOf());
            return !!(
                (this.startDate &&
                    new Date(t.getFullYear(), t.getMonth() + 1, 0, 23, 59, 59) <
                        this.startDate) ||
                (this.endDate &&
                    new Date(t.getFullYear(), t.getMonth(), 1) > this.endDate)
            );
        }),
        (s.prototype.disableNextPrevButtons = function () {
            var t, e, s;
            this.isSingleMonth() ||
                ((t = parseInt(this.getDateString(this.month1, "YYYYMM"), 10)),
                (e = parseInt(this.getDateString(this.month2, "YYYYMM"), 10)),
                (t = Math.abs(t - e)),
                (e = this.datepicker.getElementsByClassName(
                    "datepicker__month-button--next"
                )),
                (s = this.datepicker.getElementsByClassName(
                    "datepicker__month-button--prev"
                )),
                1 < t && 89 !== t
                    ? (this.removeClass(
                          e[0],
                          "datepicker__month-button--disabled"
                      ),
                      this.removeClass(
                          s[1],
                          "datepicker__month-button--disabled"
                      ))
                    : (this.addClass(
                          e[0],
                          "datepicker__month-button--disabled"
                      ),
                      this.addClass(
                          s[1],
                          "datepicker__month-button--disabled"
                      )),
                this.isMonthOutOfRange(this.getPrevMonth(this.month1))
                    ? this.addClass(s[0], "datepicker__month-button--disabled")
                    : this.removeClass(
                          s[0],
                          "datepicker__month-button--disabled"
                      ),
                this.isMonthOutOfRange(this.getNextMonth(this.month2))
                    ? this.addClass(e[1], "datepicker__month-button--disabled")
                    : this.removeClass(
                          e[1],
                          "datepicker__month-button--disabled"
                      ));
        }),
        (s.prototype.topBarDefaultText = function () {
            var t, e;
            this.showTopbar &&
                ((t = ""),
                (t =
                    this.minDays && this.maxDays
                        ? this.minDays === this.maxDays
                            ? this.lang("info-range-equal")
                            : this.lang("info-range")
                        : this.minDays && 2 < this.minDays
                        ? this.lang("info-more-plural")
                        : this.minDays
                        ? this.lang("info-more")
                        : this.lang("info-default")),
                (e = this.datepicker.getElementsByClassName(
                    "datepicker__info--feedback"
                )[0]),
                (t = t
                    .replace(/%d/, this.minDays - 1)
                    .replace(/%d/, this.maxDays - 1)),
                this.addClass(e, "datepicker__info--help"),
                this.removeClass(e, "datepicker__info--error"),
                (e.textContent = t));
        }),
        (s.prototype.topBarErrorText = function (t, e, s) {
            this.showTopbar &&
                (this.addClass(t, "datepicker__info--error"),
                this.removeClass(t, "datepicker__info--help"),
                1 < s
                    ? ((e = (e = this.lang(e + "-plural")).replace("%d", s)),
                      (t.textContent = e))
                    : (e = this.lang(e)),
                (this.datepicker.getElementsByClassName(
                    "datepicker__info--selected"
                )[0].style.display = "none"));
        }),
        (s.prototype.updateSelectableRange = function () {
            for (
                var t,
                    e = this,
                    s = this.datepicker.getElementsByTagName("td"),
                    i = this.start && !this.end,
                    a = 0;
                a < s.length;
                a++
            )
                e.hasClass(s[a], "datepicker__month-day--invalid") &&
                    e.hasClass(s[a], "datepicker__month-day--tmp") &&
                    (e.removeClass(s[a], "datepicker__month-day--tmp"),
                    e.hasClass(s[a], "datepicker__month-day--tmpinvalid")
                        ? e.removeClass(
                              s[a],
                              "datepicker__month-day--tmpinvalid"
                          )
                        : (e.removeClass(
                              s[a],
                              "datepicker__month-day--invalid"
                          ),
                          e.addClass(s[a], "datepicker__month-day--valid"))),
                    i
                        ? e.hasClass(
                              s[a],
                              "datepicker__month-day--visibleMonth"
                          ) &&
                          (e.hasClass(s[a], "datepicker__month-day--valid") ||
                              e.hasClass(
                                  s[a],
                                  "datepicker__month-day--disabled"
                              ) ||
                              e.hasClass(
                                  s[a],
                                  "datepicker__month-day--before-disabled-date"
                              )) &&
                          ((t = parseInt(s[a].getAttribute("time"), 10)),
                          e.isValidDate(t)
                              ? (e.addClass(
                                    s[a],
                                    "datepicker__month-day--valid"
                                ),
                                e.addClass(s[a], "datepicker__month-day--tmp"),
                                e.removeClass(
                                    s[a],
                                    "datepicker__month-day--invalid"
                                ),
                                e.removeClass(
                                    s[a],
                                    "datepicker__month-day--disabled"
                                ))
                              : (e.hasClass(
                                    s[a],
                                    "datepicker__month-day--invalid"
                                ) &&
                                    e.addClass(
                                        s[a],
                                        "datepicker__month-day--tmpinvalid"
                                    ),
                                e.addClass(
                                    s[a],
                                    "datepicker__month-day--invalid"
                                ),
                                e.addClass(s[a], "datepicker__month-day--tmp"),
                                e.removeClass(
                                    s[a],
                                    "datepicker__month-day--valid"
                                )))
                        : (e.hasClass(
                              s[a],
                              "datepicker__month-day--checkout-enabled"
                          ) ||
                              e.hasClass(
                                  s[a],
                                  "datepicker__month-day--before-disabled-date"
                              )) &&
                          (e.addClass(s[a], "datepicker__month-day--invalid"),
                          e.removeClass(s[a], "datepicker__month-day--valid"),
                          e.hasClass(
                              s[a],
                              "datepicker__month-day--before-disabled-date"
                          ) ||
                              e.addClass(
                                  s[a],
                                  "datepicker__month-day--disabled"
                              ));
            return !0;
        }),
        (s.prototype.dayHovering = function (t) {
            var e,
                s,
                i,
                a = this,
                n = parseInt(t.getAttribute("time"), 10),
                o = "";
            if (!this.hasClass(t, "datepicker__month-day--invalid")) {
                for (
                    var h,
                        r = this.datepicker.getElementsByTagName("td"),
                        d = 0;
                    d < r.length;
                    d++
                ) {
                    var l = parseInt(r[d].getAttribute("time"), 10);
                    l === n
                        ? a.addClass(r[d], "datepicker__month-day--hovering")
                        : a.removeClass(
                              r[d],
                              "datepicker__month-day--hovering"
                          ),
                        a.start &&
                        !a.end &&
                        ((a.start < l && l <= n) || (a.start > l && n <= l))
                            ? a.addClass(
                                  r[d],
                                  "datepicker__month-day--hovering"
                              )
                            : a.removeClass(
                                  r[d],
                                  "datepicker__month-day--hovering"
                              );
                }
                this.start &&
                    !this.end &&
                    ((h = this.countDays(n, this.start) - 1),
                    this.hoveringTooltip &&
                        ("function" == typeof this.hoveringTooltip
                            ? (o = this.hoveringTooltip(h, this.start, n))
                            : !0 === this.hoveringTooltip &&
                              0 < h &&
                              (o =
                                  h +
                                  " " +
                                  (1 == h
                                      ? this.lang("night")
                                      : this.lang("nights")))));
            }
            o
                ? ((h = t.getBoundingClientRect()),
                  (t = this.datepicker.getBoundingClientRect()),
                  (e = h.left - t.left),
                  (s = h.top - t.top),
                  (e += h.width / 2),
                  ((i = document.getElementById(
                      this.getTooltipId()
                  )).style.display = ""),
                  (i.textContent = o),
                  (t = i.getBoundingClientRect().width),
                  (h = i.getBoundingClientRect().height),
                  (e -= t / 2),
                  (s -= h),
                  setTimeout(function () {
                      (i.style.left = e + "px"), (i.style.top = s + "px");
                  }, 10))
                : (document.getElementById(this.getTooltipId()).style.display =
                      "none");
        }),
        (s.prototype.clearHovering = function () {
            for (
                var t = this.datepicker.getElementsByTagName("td"), e = 0;
                e < t.length;
                e++
            )
                this.removeClass(t[e], "datepicker__month-day--hovering");
            document.getElementById(this.getTooltipId()).style.display = "none";
        }),
        (s.prototype.clearSelection = function () {
            (this.start = !1), (this.end = !1);
            for (
                var t = this.datepicker.getElementsByTagName("td"), e = 0;
                e < t.length;
                e++
            )
                this.removeClass(t[e], "datepicker__month-day--selected"),
                    this.removeClass(
                        t[e],
                        "datepicker__month-day--first-day-selected"
                    ),
                    this.removeClass(
                        t[e],
                        "datepicker__month-day--last-day-selected"
                    ),
                    this.removeClass(t[e], "datepicker__month-day--hovering");
            this.setValue(""),
                this.checkSelection(),
                this.showSelectedInfo(),
                this.showSelectedDays();
        }),
        (s.prototype.clearDatepicker = function () {
            (this.start = !1), (this.end = !1);
            for (
                var t = this.datepicker.getElementsByTagName("td"), e = 0;
                e < t.length;
                e++
            )
                this.removeClass(t[e], "datepicker__month-day--selected"),
                    this.removeClass(
                        t[e],
                        "datepicker__month-day--first-day-selected"
                    ),
                    this.removeClass(
                        t[e],
                        "datepicker__month-day--last-day-selected"
                    ),
                    this.removeClass(t[e], "datepicker__month-day--hovering");
            this.setValue(""),
                this.checkSelection(),
                this.showSelectedInfo(),
                (this.datepicker.getElementsByClassName(
                    "datepicker__info--selected"
                )[0].style.display = "none"),
                this.showSelectedDays(),
                this.updateSelectableRange();
        }),
        (s.prototype.parseDisabledDates = function () {
            var t = [];
            this.setFechaI18n();
            for (var e = 0; e < this.disabledDates.length; e++)
                t[e] = fecha.parse(this.disabledDates[e], "YYYY-MM-DD");
            t.sort(function (t, e) {
                return t - e;
            }),
                (this.disabledDatesTime = t);
        }),
        (s.prototype.getClosestDisabledDates = function (t) {
            var e = [!1, !1];
            if (t < this.disabledDatesTime[0])
                e = this.enableCheckout
                    ? [!1, this.addDays(this.disabledDatesTime[0], 1)]
                    : [!1, this.disabledDatesTime[0]];
            else if (
                t > this.disabledDatesTime[this.disabledDatesTime.length - 1]
            )
                e = [
                    this.disabledDatesTime[this.disabledDatesTime.length - 1],
                    !1,
                ];
            else {
                for (
                    var s,
                        i = this.disabledDatesTime.length,
                        a = this.disabledDatesTime.length,
                        n = Math.abs(new Date(0, 0, 0).valueOf()),
                        o = n,
                        h = -n,
                        r = 0;
                    r < this.disabledDatesTime.length;
                    ++r
                )
                    (s = t - this.disabledDatesTime[r]) < 0 &&
                        h < s &&
                        ((a = r), (h = s)),
                        0 < s && s < o && ((i = r), (o = s));
                this.disabledDatesTime[i] && (e[0] = this.disabledDatesTime[i]),
                    void 0 === this.disabledDatesTime[i]
                        ? (e[1] = !1)
                        : this.enableCheckout
                        ? (e[1] = this.addDays(this.disabledDatesTime[a], 1))
                        : (e[1] = this.disabledDatesTime[a]);
            }
            return e;
        }),
        (s.prototype.getDisabledDays = function () {
            for (var t = [], e = [], s = new Date(), i = 0; i < 7; i++) {
                var a = this.addDays(s, i);
                t[fecha.format(a, "d")] = fecha.format(a, "dddd");
            }
            for (var n = 0; n < this.disabledDaysOfWeek.length; n++)
                e.push(t.indexOf(this.disabledDaysOfWeek[n]));
            e.sort(), (this.disabledDaysIndexes = e);
        }),
        (s.prototype.getClosestDisabledDays = function (t) {
            for (var e = [!1, !1], s = 0; s < 7; s++) {
                var i = this.substractDays(t, s);
                if (
                    -1 <
                    this.disabledDaysIndexes.indexOf(
                        parseInt(fecha.format(i, "d"), 10)
                    )
                ) {
                    e[0] = i;
                    break;
                }
            }
            for (var a = 0; a < 7; a++) {
                var n = this.addDays(t, a);
                if (
                    -1 <
                    this.disabledDaysIndexes.indexOf(
                        parseInt(fecha.format(n, "d"), 10)
                    )
                ) {
                    e[1] = n;
                    break;
                }
            }
            return e;
        }),
        (s.prototype.lang = function (t) {
            return t in this.i18n ? this.i18n[t] : "";
        }),
        (s.prototype.emptyElement = function (t) {
            for (; t.firstChild; ) t.removeChild(t.firstChild);
        }),
        (s.prototype.classRegex = function (t) {
            return new RegExp("(^|\\s+)" + t + "(\\s+|$)");
        }),
        (s.prototype.hasClass = function (t, e) {
            return this.classRegex(e).test(t.className);
        }),
        (s.prototype.addClass = function (t, e) {
            this.hasClass(t, e) || (t.className = t.className + " " + e);
        }),
        (s.prototype.removeClass = function (t, e) {
            t.className = t.className.replace(this.classRegex(e), " ");
        }),
        (s.prototype.isVisible = function (t) {
            return t.offsetWidth || t.offsetHeight || t.getClientRects().length;
        }),
        (s.prototype.slideDown = function (t, e) {
            t.style.display = "";
            var s = t.getBoundingClientRect().height;
            (t.style.height = 0),
                this.recalc(t.offsetHeight),
                (t.style.transition = "height " + e),
                (t.style.height = s + "px"),
                t.addEventListener("transitionend", function () {
                    t.style.height = t.style.transition = t.style.display = "";
                });
        }),
        (s.prototype.slideUp = function (t, e) {
            var s = t.getBoundingClientRect().height;
            (t.style.height = s + "px"),
                this.recalc(t.offsetHeight),
                (t.style.transition = "height " + e),
                (t.style.height = 0),
                t.addEventListener("transitionend", function () {
                    t.style.display = "none";
                });
        }),
        (s.prototype.recalc = function (t) {
            return t.offsetHeight;
        }),
        (s.prototype.isTouchDevice = function () {
            return (
                "ontouchstart" in window ||
                (window.DocumentTouch && document instanceof DocumentTouch)
            );
        }),
        (s.prototype.open = function () {
            this.openDatepicker();
        }),
        (s.prototype.close = function () {
            this.closeDatepicker();
        }),
        (s.prototype.getDatePicker = function () {
            return this.datepicker;
        }),
        (s.prototype.setRange = function (t, e) {
            "string" == typeof t &&
                "string" == typeof e &&
                ((t = this.parseDate(t)), (e = this.parseDate(e))),
                this.setDateRange(t, e);
        }),
        (s.prototype.clear = function () {
            this.clearSelection();
        }),
        (s.prototype.getNights = function () {
            var t,
                e,
                s = 0;
            return (
                this.start && this.end
                    ? (s = this.countDays(this.end, this.start) - 1)
                    : (t = (t = this.getValue())
                          ? t.split(this.separator)
                          : "") &&
                      2 <= t.length &&
                      ((e = this.format),
                      (s =
                          this.countDays(
                              this.parseDate(t[0], e),
                              this.parseDate(t[1], e)
                          ) - 1)),
                s
            );
        }),
        (s.prototype.destroy = function () {
            document.getElementById(this.getDatepickerId()) &&
                (this.removeAllBoundedListeners(this.input, "click"),
                this.removeAllBoundedListeners(document, "click"),
                this.removeAllBoundedListeners(this.input, "change"),
                this.datepicker.parentNode.removeChild(this.datepicker));
        }),
        s
    );
})();
