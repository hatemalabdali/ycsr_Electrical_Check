document.addEventListener('DOMContentLoaded', function() {
 // Get references to your HTML elements by their IDs
let motors_test = document.getElementById('motors_test');
let transformers_test = document.getElementById('transformers_test');
let btn_frm_motors_to_main = document.getElementById('btn_frm_motors_to_main');
let btn_frm_transformer_to_main = document.getElementById('btn_frm_transformer_to_main');

let print_motors_table = document.getElementById('print_motors_table');




let maintenance_motors_table = document.getElementById('maintenance_motors_table');
let print_transformer_table = document.getElementById('print_transformer_table');
let maintenance_transformer_table = document.getElementById('maintenance_transformer_table');
let MCB_Show = document.getElementById('MCB_Show');
let MCB_maint = document.getElementById('MCB_maint');
let MCB_test = document.getElementById('MCB_test');
let earth_test = document.getElementById('earth_test');
let Eart_Maint_Page = document.getElementById('Eart_Maint_Page');
let Earth_Show_Pge = document.getElementById('Earth_Show_Pge');
let AirCB_test = document.getElementById('AirCB_test');
let Air_C_Maint = document.getElementById('Air_C_Maint');
let Air_C_Show = document.getElementById('Air_C_Show');
let tr_test = document.getElementById('tr_test');
let tr_Maint = document.getElementById('tr_Maint');
let tr_Show = document.getElementById('tr_Show');
let logbook_btn_test = document.getElementById('logbook_btn_test');
let logbook_record = document.getElementById('logbook_record');
let logbook_show = document.getElementById('logbook_show');
/**
 * Function to be called when the transformers button is clicked.
 */

function Earthing_Maint() {
  window.location.href = "Earth_Maint.php";
}

function Earting_Show() {
  window.location.href = "Earth_Show.php";
}

function earth_btn() {
  window.location.href = "Earting.php";
}

function maint_MCB_Page() {
    // Corrected: Use console.log directly
    document.location='Maint_MCB.php';
    
}
function transformers_btn() {
    // Corrected: Use console.log directly
    document.location='weekly_transformers.php';
    
}
function AirCB_btn() {
  window.location.href = "Air_Circuit_Breakers.php";
}

/**
 * Function to be called when the motors button is clicked.
 */
function motors_btn() {
    // Corrected: Use console.log directly
     document.location='weekly_motors.php';
}

function back_to_main_page() {
    // Corrected: Use console.log directly
     document.location='index.php';
     
}


function MCB_btn() {
    window.location.href = 'mcb.php';
}

function show_MCB_page() {
    window.location.href = 'show_MCB.php';
}
// --- Attaching event listeners ---

// Check if the motors_test element exists before adding an event listener
if (motors_test) {
    motors_test.addEventListener('click', motors_btn);
    console.log("Motors button event listener attached.");
} else {
    console.warn("Element with ID 'motors_test' not found.");
}

// Check if the transformers_test element exists before adding an event listener
if (transformers_test) {
    transformers_test.addEventListener('click', transformers_btn);
    console.log("Transformers button event listener attached.");
} else {
    console.warn("Element with ID 'transformers_test' not found.");
}

if (btn_frm_motors_to_main) {
    btn_frm_motors_to_main.addEventListener('click', back_to_main_page);
    console.log("Transformers button event listener attached.");
} else {
    console.warn("Element with ID 'transformers_test' not found.");
}


if (btn_frm_transformer_to_main) {
    btn_frm_transformer_to_main.addEventListener('click', back_to_main_page);
    console.log("Transformers button event listener attached.");
} else {
    console.warn("Element with ID 'transformers_test' not found.");
}


if (MCB_Show) {
    MCB_Show.addEventListener('click', show_MCB_page);
    console.log("Transformers button event listener attached.");
} else {
    console.warn("Element with ID 'transformers_test' not found.");
}
if (MCB_maint) {
    MCB_maint.addEventListener('click', maint_MCB_Page);
    console.log("Transformers button event listener attached.");
} else {
    console.warn("Element with ID 'transformers_test' not found.");
}

if (MCB_test) {
    MCB_test.addEventListener('click', MCB_btn);
    console.log("Transformers button event listener attached.");
} else {
    console.warn("Element with ID 'transformers_test' not found.");
}

if (earth_test) {
    earth_test.addEventListener('click', earth_btn);
    console.log("Transformers button event listener attached.");
} else {
    console.warn("Element with ID 'transformers_test' not found.");
}

if (Eart_Maint_Page) {
    Eart_Maint_Page.addEventListener('click', Earthing_Maint);
    console.log("Transformers button event listener attached.");
} else {
    console.warn("Element with ID 'transformers_test' not found.");
}

if (Earth_Show_Pge) {
    Earth_Show_Pge.addEventListener('click', Earting_Show);
    console.log("Transformers button event listener attached.");
} else {
    console.warn("Element with ID 'transformers_test' not found.");
}

if (AirCB_test) {
    AirCB_test.addEventListener('click', AirCB_btn);
    console.log("Transformers button event listener attached.");
} else {
    console.warn("Element with ID 'transformers_test' not found.");
}


if (Air_C_Maint) {
    Air_C_Maint.addEventListener('click', show_Air_C_Maint);
    console.log("Transformers button event listener attached.");
} else {
    console.warn("Element with ID 'transformers_test' not found.");
}
function show_Air_C_Maint() {
    window.location.href = 'Air_Circuit_Breaker_Maint.php';
}


if (Air_C_Show) {
    Air_C_Show.addEventListener('click', show_Air_C_Show);
    console.log("Transformers button event listener attached.");
} else {
    console.warn("Element with ID 'transformers_test' not found.");
}
function show_Air_C_Show() {
    window.location.href = 'Air_Circuit_Breaker_Show.php';
}

if (tr_test) {
    tr_test.addEventListener('click', tr_btn);
    console.log("Transformers button event listener attached.");
} else {
    console.warn("Element with ID 'transformers_test' not found.");
}
function tr_btn() {
    window.location.href = 'tr.php';
}

if (tr_Maint) {
    tr_Maint.addEventListener('click', Maint_tr);
    console.log("Transformers button event listener attached.");
} else {
    console.warn("Element with ID 'transformers_test' not found.");
}
function Maint_tr() {
    window.location.href = 'tr_Maint.php';
}

if (tr_Show) {
    tr_Show.addEventListener('click', show_tr);
    console.log("Transformers button event listener attached.");
} else {
    console.warn("Element with ID 'transformers_test' not found.");
}
function show_tr() {
    window.location.href = 'tr_show.php';
}
if (logbook_btn_test) {
    logbook_btn_test.addEventListener('click', logbook);
    
} else {
    console.warn("Element with ID 'transformers_test' not found.");
}
function logbook() {
    window.location.href = 'logbook.php';
}

if (logbook_record) {
    logbook_record.addEventListener('click', logbook_recording);
    
} else {
    console.warn("Element with ID 'transformers_test' not found.");
}
function logbook_recording() {
    window.location.href = 'logbook_maint.php';
}

if (logbook_show) {
    logbook_show.addEventListener('click', logbook_showing);
    
} else {
    console.warn("Element with ID 'transformers_test' not found.");
}
function logbook_showing() {
    window.location.href = 'logbook_show.php';
}
// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%     كود عرض التاريخ       %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

let currentDisplayDate = new Date(); // يبدأ من التاريخ الحالي لعرض الشهر الحالي والماضي
let chossyear;
let chossemonth;
let chossweek; // يتطلب حساب الأسبوع
let chossday;

let yearh = document.getElementById('yearh');
let monthh = document.getElementById('monthh');
let weekh = document.getElementById('weekh');
let dayh = document.getElementById('dayh');




function display_date() {
    // عرض الشهر الحالي والماضي عند استدعاء الدالة لأول مرة
    renderCalendars(currentDisplayDate);

    // إضافة مستمعي الأحداث لأزرار التنقل
    document.getElementById('prevMonth').addEventListener('click', function() {
        currentDisplayDate.setMonth(currentDisplayDate.getMonth() - 1);
        renderCalendars(currentDisplayDate);
    });

    document.getElementById('nextMonth').addEventListener('click', function() {
        currentDisplayDate.setMonth(currentDisplayDate.getMonth() + 1);
        renderCalendars(currentDisplayDate);
    });
}

function display_date2() {
    // عرض الشهر الحالي والماضي عند استدعاء الدالة لأول مرة
    renderCalendars2(currentDisplayDate);

    // إضافة مستمعي الأحداث لأزرار التنقل
    document.getElementById('prevMonth').addEventListener('click', function() {
        currentDisplayDate.setMonth(currentDisplayDate.getMonth() - 1);
        renderCalendars2(currentDisplayDate);
    });

    document.getElementById('nextMonth').addEventListener('click', function() {
        currentDisplayDate.setMonth(currentDisplayDate.getMonth() + 1);
        renderCalendars2(currentDisplayDate);
    });
}

function display_date3() {
    // عرض الشهر الحالي والماضي عند استدعاء الدالة لأول مرة
    renderCalendars3(currentDisplayDate);

    // إضافة مستمعي الأحداث لأزرار التنقل
    document.getElementById('prevMonth').addEventListener('click', function() {
        currentDisplayDate.setMonth(currentDisplayDate.getMonth() - 1);
        renderCalendars3(currentDisplayDate);
    });

    document.getElementById('nextMonth').addEventListener('click', function() {
        currentDisplayDate.setMonth(currentDisplayDate.getMonth() + 1);
        renderCalendars3(currentDisplayDate);
    });
}
function display_date4() {
    // عرض الشهر الحالي والماضي عند استدعاء الدالة لأول مرة
    renderCalendars4(currentDisplayDate);

    // إضافة مستمعي الأحداث لأزرار التنقل
    document.getElementById('prevMonth').addEventListener('click', function() {
        currentDisplayDate.setMonth(currentDisplayDate.getMonth() - 1);
        renderCalendars4(currentDisplayDate);
    });

    document.getElementById('nextMonth').addEventListener('click', function() {
        currentDisplayDate.setMonth(currentDisplayDate.getMonth() + 1);
        renderCalendars4(currentDisplayDate);
    });
}

function renderCalendars(date) {
    const lastMonthDate = new Date(date.getFullYear(), date.getMonth() - 1, 1);
    const currentMonthDate = new Date(date.getFullYear(), date.getMonth(), 1);

    // تحديث عنوان الشهر والسنة
    document.getElementById('currentMonthYear').textContent =
        `${getMonthName(currentMonthDate.getMonth())} ${currentMonthDate.getFullYear()}`;

    // عرض التقويمين
    document.getElementById('lastMonthCalendar').innerHTML = buildCalendar(lastMonthDate);
    document.getElementById('currentMonthCalendar').innerHTML = buildCalendar(currentMonthDate);

    // إضافة مستمعي الأحداث للأيام بعد بناء التقويمات
     addDayClickListeners();
    
}

function renderCalendars2(date) {
    const lastMonthDate = new Date(date.getFullYear(), date.getMonth() - 1, 1);
    const currentMonthDate = new Date(date.getFullYear(), date.getMonth(), 1);

    // تحديث عنوان الشهر والسنة
    document.getElementById('currentMonthYear').textContent =
        `${getMonthName(currentMonthDate.getMonth())} ${currentMonthDate.getFullYear()}`;

    // عرض التقويمين
    document.getElementById('lastMonthCalendar').innerHTML = buildCalendar(lastMonthDate);
    document.getElementById('currentMonthCalendar').innerHTML = buildCalendar(currentMonthDate);

    // إضافة مستمعي الأحداث للأيام بعد بناء التقويمات
     addDayClickListeners2();
    
}

function renderCalendars3(date) {
    const lastMonthDate = new Date(date.getFullYear(), date.getMonth() - 1, 1);
    const currentMonthDate = new Date(date.getFullYear(), date.getMonth(), 1);

    // تحديث عنوان الشهر والسنة
    document.getElementById('currentMonthYear').textContent =
        `${getMonthName(currentMonthDate.getMonth())} ${currentMonthDate.getFullYear()}`;

    // عرض التقويمين
    document.getElementById('lastMonthCalendar').innerHTML = buildCalendar(lastMonthDate);
    document.getElementById('currentMonthCalendar').innerHTML = buildCalendar(currentMonthDate);

    // إضافة مستمعي الأحداث للأيام بعد بناء التقويمات
     addDayClickListeners3();
    
}
function renderCalendars4(date) {
    const lastMonthDate = new Date(date.getFullYear(), date.getMonth() - 1, 1);
    const currentMonthDate = new Date(date.getFullYear(), date.getMonth(), 1);

    // تحديث عنوان الشهر والسنة
    document.getElementById('currentMonthYear').textContent =
        `${getMonthName(currentMonthDate.getMonth())} ${currentMonthDate.getFullYear()}`;

    // عرض التقويمين
    document.getElementById('lastMonthCalendar').innerHTML = buildCalendar(lastMonthDate);
    document.getElementById('currentMonthCalendar').innerHTML = buildCalendar(currentMonthDate);

    // إضافة مستمعي الأحداث للأيام بعد بناء التقويمات
     addDayClickListeners4();
    
}
function buildCalendar(date) {
    const year = date.getFullYear();
    const month = date.getMonth(); // 0-11
    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0); // آخر يوم في الشهر
    const numDays = lastDay.getDate();
    const firstDayOfWeek = firstDay.getDay(); // 0 (الأحد) - 6 (السبت)

    let html = `
        <h4>${getMonthName(month)} ${year}</h4>
        <table>
            <thead>
                <tr>
                    <th>أحد</th><th>اثنين</th><th>ثلاثاء</th><th>أربعاء</th><th>خميس</th><th>جمعة</th><th>سبت</th>
                </tr>
            </thead>
            <tbody>
                <tr>
    `;

    // ملء الأيام الفارغة قبل اليوم الأول من الشهر
    for (let i = 0; i < firstDayOfWeek; i++) {
        html += `<td></td>`;
    }

    // ملء الأيام الفعلية للشهر
    for (let day = 1; day <= numDays; day++) {
        const currentDayDate = new Date(year, month, day);
        const dayOfWeek = currentDayDate.getDay();

        if (dayOfWeek === 0 && day !== 1) { // بدء صف جديد كل أسبوع (ما عدا أول يوم إذا كان هو أول الأسبوع)
            html += `</tr><tr>`;
        }

        html += `<td data-year="${year}" data-month="${month + 1}" data-day="${day}" class="calendar-day">${day}</td>`;
    }

    // ملء الأيام الفارغة بعد آخر يوم في الشهر
    const remainingCells = 7 - (firstDayOfWeek + numDays) % 7;
    if (remainingCells < 7) { // إذا لم يكن الصف ممتلئاً بالكامل
        for (let i = 0; i < remainingCells; i++) {
            html += `<td></td>`;
        }
    }

    html += `
                </tr>
            </tbody>
        </table>
    `;

    return html;
}

function getMonthName(monthIndex) {
    const monthNames = [
        "يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو",
        "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"
    ];
    return monthNames[monthIndex];
}







function getWeekNumber(d) {
    const year = d.getFullYear();
    const month = d.getMonth() + 1;
    const day = d.getDate();
    
    // تعريف أسابيع كل سنة من 2025 إلى 2030 بدقة كاملة
    const weekCalendar = {
        2025: [
            { start: [1,1], end: [4,1], week: 1 }, { start: [5,1], end: [11,1], week: 2 },
            { start: [12,1], end: [18,1], week: 3 }, { start: [19,1], end: [25,1], week: 4 },
            { start: [26,1], end: [1,2], week: 5 }, { start: [2,2], end: [8,2], week: 6 },
            { start: [9,2], end: [15,2], week: 7 }, { start: [16,2], end: [22,2], week: 8 },
            { start: [23,2], end: [1,3], week: 9 }, { start: [2,3], end: [8,3], week: 10 },
            { start: [9,3], end: [15,3], week: 11 }, { start: [16,3], end: [22,3], week: 12 },
            { start: [23,3], end: [29,3], week: 13 }, { start: [30,3], end: [5,4], week: 14 },
            { start: [6,4], end: [12,4], week: 15 }, { start: [13,4], end: [19,4], week: 16 },
            { start: [20,4], end: [26,4], week: 17 }, { start: [27,4], end: [3,5], week: 18 },
            { start: [4,5], end: [10,5], week: 19 }, { start: [11,5], end: [17,5], week: 20 },
            { start: [18,5], end: [24,5], week: 21 }, { start: [25,5], end: [31,5], week: 22 },
            { start: [1,6], end: [7,6], week: 23 }, { start: [8,6], end: [14,6], week: 24 },
            { start: [15,6], end: [21,6], week: 25 }, { start: [22,6], end: [28,6], week: 26 },
            { start: [29,6], end: [5,7], week: 27 }, { start: [6,7], end: [12,7], week: 28 },
            { start: [13,7], end: [19,7], week: 29 }, { start: [20,7], end: [26,7], week: 30 },
            { start: [27,7], end: [2,8], week: 31 }, { start: [3,8], end: [9,8], week: 32 },
            { start: [10,8], end: [16,8], week: 33 }, { start: [17,8], end: [23,8], week: 34 },
            { start: [24,8], end: [30,8], week: 35 }, { start: [31,8], end: [6,9], week: 36 },
            { start: [7,9], end: [13,9], week: 37 }, { start: [14,9], end: [20,9], week: 38 },
            { start: [21,9], end: [27,9], week: 39 }, { start: [28,9], end: [4,10], week: 40 },
            { start: [5,10], end: [11,10], week: 41 }, { start: [12,10], end: [18,10], week: 42 },
            { start: [19,10], end: [25,10], week: 43 }, { start: [26,10], end: [1,11], week: 44 },
            { start: [2,11], end: [8,11], week: 45 }, { start: [9,11], end: [15,11], week: 46 },
            { start: [16,11], end: [22,11], week: 47 }, { start: [23,11], end: [29,11], week: 48 },
            { start: [30,11], end: [6,12], week: 49 }, { start: [7,12], end: [13,12], week: 50 },
            { start: [14,12], end: [20,12], week: 51 }, { start: [21,12], end: [27,12], week: 52 },
            { start: [28,12], end: [3,1,2026], week: 53 }
        ],
        2026: [
            { start: [4,1], end: [10,1], week: 1 }, { start: [11,1], end: [17,1], week: 2 },
            { start: [18,1], end: [24,1], week: 3 }, { start: [25,1], end: [31,1], week: 4 },
            { start: [1,2], end: [7,2], week: 5 }, { start: [8,2], end: [14,2], week: 6 },
            { start: [15,2], end: [21,2], week: 7 }, { start: [22,2], end: [28,2], week: 8 },
            { start: [1,3], end: [7,3], week: 9 }, { start: [8,3], end: [14,3], week: 10 },
            { start: [15,3], end: [21,3], week: 11 }, { start: [22,3], end: [28,3], week: 12 },
            { start: [29,3], end: [4,4], week: 13 }, { start: [5,4], end: [11,4], week: 14 },
            { start: [12,4], end: [18,4], week: 15 }, { start: [19,4], end: [25,4], week: 16 },
            { start: [26,4], end: [2,5], week: 17 }, { start: [3,5], end: [9,5], week: 18 },
            { start: [10,5], end: [16,5], week: 19 }, { start: [17,5], end: [23,5], week: 20 },
            { start: [24,5], end: [30,5], week: 21 }, { start: [31,5], end: [6,6], week: 22 },
            { start: [7,6], end: [13,6], week: 23 }, { start: [14,6], end: [20,6], week: 24 },
            { start: [21,6], end: [27,6], week: 25 }, { start: [28,6], end: [4,7], week: 26 },
            { start: [5,7], end: [11,7], week: 27 }, { start: [12,7], end: [18,7], week: 28 },
            { start: [19,7], end: [25,7], week: 29 }, { start: [26,7], end: [1,8], week: 30 },
            { start: [2,8], end: [8,8], week: 31 }, { start: [9,8], end: [15,8], week: 32 },
            { start: [16,8], end: [22,8], week: 33 }, { start: [23,8], end: [29,8], week: 34 },
            { start: [30,8], end: [5,9], week: 35 }, { start: [6,9], end: [12,9], week: 36 },
            { start: [13,9], end: [19,9], week: 37 }, { start: [20,9], end: [26,9], week: 38 },
            { start: [27,9], end: [3,10], week: 39 }, { start: [4,10], end: [10,10], week: 40 },
            { start: [11,10], end: [17,10], week: 41 }, { start: [18,10], end: [24,10], week: 42 },
            { start: [25,10], end: [31,10], week: 43 }, { start: [1,11], end: [7,11], week: 44 },
            { start: [8,11], end: [14,11], week: 45 }, { start: [15,11], end: [21,11], week: 46 },
            { start: [22,11], end: [28,11], week: 47 }, { start: [29,11], end: [5,12], week: 48 },
            { start: [6,12], end: [12,12], week: 49 }, { start: [13,12], end: [19,12], week: 50 },
            { start: [20,12], end: [26,12], week: 51 }, { start: [27,12], end: [2,1,2027], week: 52 }
        ],
        2027: [
            { start: [3,1], end: [9,1], week: 1 }, { start: [10,1], end: [16,1], week: 2 },
            { start: [17,1], end: [23,1], week: 3 }, { start: [24,1], end: [30,1], week: 4 },
            { start: [31,1], end: [6,2], week: 5 }, { start: [7,2], end: [13,2], week: 6 },
            { start: [14,2], end: [20,2], week: 7 }, { start: [21,2], end: [27,2], week: 8 },
            { start: [28,2], end: [6,3], week: 9 }, { start: [7,3], end: [13,3], week: 10 },
            { start: [14,3], end: [20,3], week: 11 }, { start: [21,3], end: [27,3], week: 12 },
            { start: [28,3], end: [3,4], week: 13 }, { start: [4,4], end: [10,4], week: 14 },
            { start: [11,4], end: [17,4], week: 15 }, { start: [18,4], end: [24,4], week: 16 },
            { start: [25,4], end: [1,5], week: 17 }, { start: [2,5], end: [8,5], week: 18 },
            { start: [9,5], end: [15,5], week: 19 }, { start: [16,5], end: [22,5], week: 20 },
            { start: [23,5], end: [29,5], week: 21 }, { start: [30,5], end: [5,6], week: 22 },
            { start: [6,6], end: [12,6], week: 23 }, { start: [13,6], end: [19,6], week: 24 },
            { start: [20,6], end: [26,6], week: 25 }, { start: [27,6], end: [3,7], week: 26 },
            { start: [4,7], end: [10,7], week: 27 }, { start: [11,7], end: [17,7], week: 28 },
            { start: [18,7], end: [24,7], week: 29 }, { start: [25,7], end: [31,7], week: 30 },
            { start: [1,8], end: [7,8], week: 31 }, { start: [8,8], end: [14,8], week: 32 },
            { start: [15,8], end: [21,8], week: 33 }, { start: [22,8], end: [28,8], week: 34 },
            { start: [29,8], end: [4,9], week: 35 }, { start: [5,9], end: [11,9], week: 36 },
            { start: [12,9], end: [18,9], week: 37 }, { start: [19,9], end: [25,9], week: 38 },
            { start: [26,9], end: [2,10], week: 39 }, { start: [3,10], end: [9,10], week: 40 },
            { start: [10,10], end: [16,10], week: 41 }, { start: [17,10], end: [23,10], week: 42 },
            { start: [24,10], end: [30,10], week: 43 }, { start: [31,10], end: [6,11], week: 44 },
            { start: [7,11], end: [13,11], week: 45 }, { start: [14,11], end: [20,11], week: 46 },
            { start: [21,11], end: [27,11], week: 47 }, { start: [28,11], end: [4,12], week: 48 },
            { start: [5,12], end: [11,12], week: 49 }, { start: [12,12], end: [18,12], week: 50 },
            { start: [19,12], end: [25,12], week: 51 }, { start: [26,12], end: [1,1,2028], week: 52 }
        ],
        2028: [
            { start: [2,1], end: [8,1], week: 1 }, { start: [9,1], end: [15,1], week: 2 },
            { start: [16,1], end: [22,1], week: 3 }, { start: [23,1], end: [29,1], week: 4 },
            { start: [30,1], end: [5,2], week: 5 }, { start: [6,2], end: [12,2], week: 6 },
            { start: [13,2], end: [19,2], week: 7 }, { start: [20,2], end: [26,2], week: 8 },
            { start: [27,2], end: [4,3], week: 9 }, { start: [5,3], end: [11,3], week: 10 },
            { start: [12,3], end: [18,3], week: 11 }, { start: [19,3], end: [25,3], week: 12 },
            { start: [26,3], end: [1,4], week: 13 }, { start: [2,4], end: [8,4], week: 14 },
            { start: [9,4], end: [15,4], week: 15 }, { start: [16,4], end: [22,4], week: 16 },
            { start: [23,4], end: [29,4], week: 17 }, { start: [30,4], end: [6,5], week: 18 },
            { start: [7,5], end: [13,5], week: 19 }, { start: [14,5], end: [20,5], week: 20 },
            { start: [21,5], end: [27,5], week: 21 }, { start: [28,5], end: [3,6], week: 22 },
            { start: [4,6], end: [10,6], week: 23 }, { start: [11,6], end: [17,6], week: 24 },
            { start: [18,6], end: [24,6], week: 25 }, { start: [25,6], end: [1,7], week: 26 },
            { start: [2,7], end: [8,7], week: 27 }, { start: [9,7], end: [15,7], week: 28 },
            { start: [16,7], end: [22,7], week: 29 }, { start: [23,7], end: [29,7], week: 30 },
            { start: [30,7], end: [5,8], week: 31 }, { start: [6,8], end: [12,8], week: 32 },
            { start: [13,8], end: [19,8], week: 33 }, { start: [20,8], end: [26,8], week: 34 },
            { start: [27,8], end: [2,9], week: 35 }, { start: [3,9], end: [9,9], week: 36 },
            { start: [10,9], end: [16,9], week: 37 }, { start: [17,9], end: [23,9], week: 38 },
            { start: [24,9], end: [30,9], week: 39 }, { start: [1,10], end: [7,10], week: 40 },
            { start: [8,10], end: [14,10], week: 41 }, { start: [15,10], end: [21,10], week: 42 },
            { start: [22,10], end: [28,10], week: 43 }, { start: [29,10], end: [4,11], week: 44 },
            { start: [5,11], end: [11,11], week: 45 }, { start: [12,11], end: [18,11], week: 46 },
            { start: [19,11], end: [25,11], week: 47 }, { start: [26,11], end: [2,12], week: 48 },
            { start: [3,12], end: [9,12], week: 49 }, { start: [10,12], end: [16,12], week: 50 },
            { start: [17,12], end: [23,12], week: 51 }, { start: [24,12], end: [30,12], week: 52 },
            { start: [31,12], end: [6,1,2029], week: 53 }
        ],
        2029: [
            { start: [7,1], end: [13,1], week: 1 }, { start: [14,1], end: [20,1], week: 2 },
            { start: [21,1], end: [27,1], week: 3 }, { start: [28,1], end: [3,2], week: 4 },
            { start: [4,2], end: [10,2], week: 5 }, { start: [11,2], end: [17,2], week: 6 },
            { start: [18,2], end: [24,2], week: 7 }, { start: [25,2], end: [3,3], week: 8 },
            { start: [4,3], end: [10,3], week: 9 }, { start: [11,3], end: [17,3], week: 10 },
            { start: [18,3], end: [24,3], week: 11 }, { start: [25,3], end: [31,3], week: 12 },
            { start: [1,4], end: [7,4], week: 13 }, { start: [8,4], end: [14,4], week: 14 },
            { start: [15,4], end: [21,4], week: 15 }, { start: [22,4], end: [28,4], week: 16 },
            { start: [29,4], end: [5,5], week: 17 }, { start: [6,5], end: [12,5], week: 18 },
            { start: [13,5], end: [19,5], week: 19 }, { start: [20,5], end: [26,5], week: 20 },
            { start: [27,5], end: [2,6], week: 21 }, { start: [3,6], end: [9,6], week: 22 },
            { start: [10,6], end: [16,6], week: 23 }, { start: [17,6], end: [23,6], week: 24 },
            { start: [24,6], end: [30,6], week: 25 }, { start: [1,7], end: [7,7], week: 26 },
            { start: [8,7], end: [14,7], week: 27 }, { start: [15,7], end: [21,7], week: 28 },
            { start: [22,7], end: [28,7], week: 29 }, { start: [29,7], end: [4,8], week: 30 },
            { start: [5,8], end: [11,8], week: 31 }, { start: [12,8], end: [18,8], week: 32 },
            { start: [19,8], end: [25,8], week: 33 }, { start: [26,8], end: [1,9], week: 34 },
            { start: [2,9], end: [8,9], week: 35 }, { start: [9,9], end: [15,9], week: 36 },
            { start: [16,9], end: [22,9], week: 37 }, { start: [23,9], end: [29,9], week: 38 },
            { start: [30,9], end: [6,10], week: 39 }, { start: [7,10], end: [13,10], week: 40 },
            { start: [14,10], end: [20,10], week: 41 }, { start: [21,10], end: [27,10], week: 42 },
            { start: [28,10], end: [3,11], week: 43 }, { start: [4,11], end: [10,11], week: 44 },
            { start: [11,11], end: [17,11], week: 45 }, { start: [18,11], end: [24,11], week: 46 },
            { start: [25,11], end: [1,12], week: 47 }, { start: [2,12], end: [8,12], week: 48 },
            { start: [9,12], end: [15,12], week: 49 }, { start: [16,12], end: [22,12], week: 50 },
            { start: [23,12], end: [29,12], week: 51 }, { start: [30,12], end: [5,1,2030], week: 52 }
        ],
        2030: [
            { start: [6,1], end: [12,1], week: 1 }, { start: [13,1], end: [19,1], week: 2 },
            { start: [20,1], end: [26,1], week: 3 }, { start: [27,1], end: [2,2], week: 4 },
            { start: [3,2], end: [9,2], week: 5 }, { start: [10,2], end: [16,2], week: 6 },
            { start: [17,2], end: [23,2], week: 7 }, { start: [24,2], end: [2,3], week: 8 },
            { start: [3,3], end: [9,3], week: 9 }, { start: [10,3], end: [16,3], week: 10 },
            { start: [17,3], end: [23,3], week: 11 }, { start: [24,3], end: [30,3], week: 12 },
            { start: [31,3], end: [6,4], week: 13 }, { start: [7,4], end: [13,4], week: 14 },
            { start: [14,4], end: [20,4], week: 15 }, { start: [21,4], end: [27,4], week: 16 },
            { start: [28,4], end: [4,5], week: 17 }, { start: [5,5], end: [11,5], week: 18 },
            { start: [12,5], end: [18,5], week: 19 }, { start: [19,5], end: [25,5], week: 20 },
            { start: [26,5], end: [1,6], week: 21 }, { start: [2,6], end: [8,6], week: 22 },
            { start: [9,6], end: [15,6], week: 23 }, { start: [16,6], end: [22,6], week: 24 },
            { start: [23,6], end: [29,6], week: 25 }, { start: [30,6], end: [6,7], week: 26 },
            { start: [7,7], end: [13,7], week: 27 }, { start: [14,7], end: [20,7], week: 28 },
            { start: [21,7], end: [27,7], week: 29 }, { start: [28,7], end: [3,8], week: 30 },
            { start: [4,8], end: [10,8], week: 31 }, { start: [11,8], end: [17,8], week: 32 },
            { start: [18,8], end: [24,8], week: 33 }, { start: [25,8], end: [31,8], week: 34 },
            { start: [1,9], end: [7,9], week: 35 }, { start: [8,9], end: [14,9], week: 36 },
            { start: [15,9], end: [21,9], week: 37 }, { start: [22,9], end: [28,9], week: 38 },
            { start: [29,9], end: [5,10], week: 39 }, { start: [6,10], end: [12,10], week: 40 },
            { start: [13,10], end: [19,10], week: 41 }, { start: [20,10], end: [26,10], week: 42 },
            { start: [27,10], end: [2,11], week: 43 }, { start: [3,11], end: [9,11], week: 44 },
            { start: [10,11], end: [16,11], week: 45 }, { start: [17,11], end: [23,11], week: 46 },
            { start: [24,11], end: [30,11], week: 47 }, { start: [1,12], end: [7,12], week: 48 },
            { start: [8,12], end: [14,12], week: 49 }, { start: [15,12], end: [21,12], week: 50 },
            { start: [22,12], end: [28,12], week: 51 }, { start: [29,12], end: [4,1,2031], week: 52 }
        ]
    };

    // البحث عن الأسبوع المناسب بدقة
    const yearWeeks = weekCalendar[year];
    if (yearWeeks) {
        for (const week of yearWeeks) {
            const [startDay, startMonth] = week.start;
            const [endDay, endMonth, endYear] = week.end;
            
            // التحقق إذا كان التاريخ في نفس الشهر
            if (month === startMonth && day >= startDay) {
                if (startMonth === endMonth) {
                    if (day <= endDay) {
                        return createWeekResult(week, year);
                    }
                } else {
                    // إذا كان الأسبوع يمتد لشهر آخر
                    if (day <= 31) { // نهاية الشهر
                        return createWeekResult(week, year);
                    }
                }
            }
            
            // التحقق إذا كان التاريخ في الشهر التالي
            if (month === endMonth && day <= endDay) {
                return createWeekResult(week, year);
            }
        }
    }

    return { weekNo: 0, startDay: 0, startMonth: 0, startYear: 0, endDay: 0, endMonth: 0, endYear: 0 };
}

// دالة مساعدة لإنشاء النتيجة
function createWeekResult(week, currentYear) {
    const [startDay, startMonth, startYear] = week.start;
    const [endDay, endMonth, endYear] = week.end;
    
    return {
        weekNo: week.week,
        startDay: startDay,
        startMonth: startMonth,
        startYear: startYear || currentYear,
        endDay: endDay,
        endMonth: endMonth,
        endYear: endYear || currentYear
    };
}


function addDayClickListeners() {
    document.querySelectorAll('.calendar-day').forEach(dayElement => {
        dayElement.addEventListener('click', function() {
            // إزالة التحديد من اليوم السابق (إذا وجد)
            const previouslySelected = document.querySelector('.calendar-day.selected');
            if (previouslySelected) {
                previouslySelected.classList.remove('selected');
            }

            // إضافة التحديد لليوم الحالي
            this.classList.add('selected');

            // حفظ معلومات اليوم المحدد في المتغيرات المطلوبة
            chossyear = parseInt(this.dataset.year);
            chossemonth = parseInt(this.dataset.month);
            chossday = parseInt(this.dataset.day);
             chossweek = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).weekNo;
            XstarDay = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).startDay;
            XstarMonth = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).startMonth;
            XstarYear = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).startYear;
            XendDay = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).endDay;
            XendMonth = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).endMonth;
            XendYear = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).endYear;
            //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
           
    
          
            //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            /**
 * تحسب أول وآخر يوم في أسبوع معين (بناءً على معيار ISO 8601: يبدأ الأسبوع يوم الاثنين).
 * @param {number} year السنة.
 * @param {number} weekNumber رقم الأسبوع (1-53).
 * @returns {object} كائن يحتوي على تاريخ بدء الأسبوع وتاريخ نهاية الأسبوع.
 */
function getWeekRangeDates(year, weekNumber) {
    // 1. نبدأ بـ 4 يناير من السنة المعطاة، لأنه وفقًا لمعيار ISO 8601،
    // الأسبوع الأول من السنة هو الأسبوع الذي يحتوي على 4 يناير.
    const jan4 = new Date(year, 0, 4); // Month is 0-indexed, so 0 is January

    // 2. نحسب رقم اليوم في الأسبوع لـ 4 يناير (0 = الأحد، 1 = الاثنين، وهكذا).
    // نحتاج لجعل الأحد (0) يكون 7 ليتوافق مع الحساب.
    const jan4Day = (jan4.getDay() === 0) ? 7 : jan4.getDay(); // 1 = الاثنين, 7 = الأحد

    // 3. نحسب يوم الاثنين الأول في تلك السنة (أو يوم الاثنين الأخير من السنة السابقة إذا كان 1 يناير يوم جمعة/سبت/أحد).
    // نطرح عدد الأيام من 4 يناير للوصول إلى يوم الاثنين الذي يسبقه أو يساويه.
    const firstMondayOfYear = new Date(jan4.getFullYear(), 0, 4 - jan4Day + 1);

    // 4. الآن، نحسب تاريخ أول يوم في الأسبوع المطلوب.
    // الأسبوع `weekNumber` يبدأ بعد (weekNumber - 1) * 7 أيام من أول يوم اثنين في السنة.
    const firstDayOfWeek = new Date(firstMondayOfYear.getFullYear(), firstMondayOfYear.getMonth(), firstMondayOfYear.getDate() + (weekNumber - 1) * 7);

    // 5. تاريخ آخر يوم في الأسبوع هو ببساطة أول يوم في الأسبوع + 6 أيام.
    const lastDayOfWeek = new Date(firstDayOfWeek.getFullYear(), firstDayOfWeek.getMonth(), firstDayOfWeek.getDate() + 6);

    return {
        firstDay: firstDayOfWeek,
        lastDay: lastDayOfWeek
    };
}

// مثال على الاستخدام:
// لنفترض أننا حصلنا على chossyear و chossweek من الصفحة السابقة
// let chosenYear = 2025; // مثال
// let chosenWeek = 23;  // مثال (الأسبوع الحالي حسب تاريخ اليوم)

// إذا كنت تستخدم query parameters
const urlParams = new URLSearchParams(window.location.search);
const chosenYear = parseInt(urlParams.get('year'));
const chosenWeek = parseInt(urlParams.get('week'));

// تحقق من أن القيم صالحة
if (!isNaN(chosenYear) && !isNaN(chosenWeek)) {
    const weekDates = getWeekRangeDates(chosenYear, chosenWeek);

    console.log(`السنة: ${chosenYear}, الأسبوع: ${chosenWeek}`);
    console.log(`أول يوم في الأسبوع: ${weekDates.firstDay.toLocaleDateString('ar-EG', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}`);
    console.log(`آخر يوم في الأسبوع: ${weekDates.lastDay.toLocaleDateString('ar-EG', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}`);

    // يمكنك الآن استخدام weekDates.firstDay و weekDates.lastDay
    // لتحديث واجهة المستخدم في صفحتك الجديدة.
    // مثال:
    // document.getElementById('weekStart').textContent = weekDates.firstDay.toLocaleDateString();
    // document.getElementById('weekEnd').textContent = weekDates.lastDay.toLocaleDateString();

} else {
    console.warn("لم يتم تمرير Year أو WeekNumber بشكل صحيح إلى الصفحة.");
}
            yearh.textContent= chossyear;
            monthh.textContent= chossemonth;
            weekh.textContent= chossweek;
            dayh.textContent= chossday;

             // تخزين المتغيرات في Local Storage
    localStorage.setItem('chosenYear', chossyear);
    localStorage.setItem('chosenMonth', chossemonth);
    localStorage.setItem('chosenDay', chossday);
    localStorage.setItem('chosenWeek', chossweek);

    localStorage.setItem('choseStartDay', XstarDay);
    localStorage.setItem('choseStartMonth', XstarMonth);
    localStorage.setItem('choseStartYear', XstarYear);
    localStorage.setItem('choseEndDay', XendDay);
    localStorage.setItem('choseEndMonth', XendMonth);
    localStorage.setItem('choseEndYear', XendYear);

    // إذا كنت تريد تخزينها ككائن واحد (أفضل للمتغيرات المتعددة):
    const chosenDateData = {
        year: chossyear,
        month: chossemonth,
        day: chossday,
        week: chossweek,

        ystartday: XstarDay,
        ystartmonth: XstarMonth,
        ystartyear: XstarYear,
        yendday: XendDay,
        yendmonth: XendMonth,
        yendyear: XendYear
    };
    localStorage.setItem('chosenDate', JSON.stringify(chosenDateData)); // يجب تحويل الكائن إلى string
    

            
            document.location='show_moror_week_group_a.php';
          
            console.log(`Year: ${chossyear}, Month: ${chossemonth}, Day: ${chossday}, Week: ${chossweek},Start Day: ${XstarDay}, Start Month: ${XstarMonth}, Start Year: ${XstarYear}, End Day: ${XendDay}, End Month: ${XendMonth}, End Year: ${XendYear}`);
            // هنا يمكنك تنفيذ أي كود إضافي بناءً على اليوم المحدد
        });
    });
    
}

function addDayClickListeners2() {
    document.querySelectorAll('.calendar-day').forEach(dayElement => {
        dayElement.addEventListener('click', function() {
            // إزالة التحديد من اليوم السابق (إذا وجد)
            const previouslySelected = document.querySelector('.calendar-day.selected');
            if (previouslySelected) {
                previouslySelected.classList.remove('selected');
            }

            // إضافة التحديد لليوم الحالي
            this.classList.add('selected');

            // حفظ معلومات اليوم المحدد في المتغيرات المطلوبة
            chossyear = parseInt(this.dataset.year);
            chossemonth = parseInt(this.dataset.month);
            chossday = parseInt(this.dataset.day);
             chossweek = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).weekNo;
            XstarDay = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).startDay;
            XstarMonth = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).startMonth;
            XstarYear = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).startYear;
            XendDay = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).endDay;
            XendMonth = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).endMonth;
            XendYear = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).endYear;
            /**
 * تحسب أول وآخر يوم في أسبوع معين (بناءً على معيار ISO 8601: يبدأ الأسبوع يوم الاثنين).
 * @param {number} year السنة.
 * @param {number} weekNumber رقم الأسبوع (1-53).
 * @returns {object} كائن يحتوي على تاريخ بدء الأسبوع وتاريخ نهاية الأسبوع.
 */
function getWeekRangeDates(year, weekNumber) {
    // 1. نبدأ بـ 4 يناير من السنة المعطاة، لأنه وفقًا لمعيار ISO 8601،
    // الأسبوع الأول من السنة هو الأسبوع الذي يحتوي على 4 يناير.
    const jan4 = new Date(year, 0, 4); // Month is 0-indexed, so 0 is January

    // 2. نحسب رقم اليوم في الأسبوع لـ 4 يناير (0 = الأحد، 1 = الاثنين، وهكذا).
    // نحتاج لجعل الأحد (0) يكون 7 ليتوافق مع الحساب.
    const jan4Day = (jan4.getDay() === 0) ? 7 : jan4.getDay(); // 1 = الاثنين, 7 = الأحد

    // 3. نحسب يوم الاثنين الأول في تلك السنة (أو يوم الاثنين الأخير من السنة السابقة إذا كان 1 يناير يوم جمعة/سبت/أحد).
    // نطرح عدد الأيام من 4 يناير للوصول إلى يوم الاثنين الذي يسبقه أو يساويه.
    const firstMondayOfYear = new Date(jan4.getFullYear(), 0, 4 - jan4Day + 1);

    // 4. الآن، نحسب تاريخ أول يوم في الأسبوع المطلوب.
    // الأسبوع `weekNumber` يبدأ بعد (weekNumber - 1) * 7 أيام من أول يوم اثنين في السنة.
    const firstDayOfWeek = new Date(firstMondayOfYear.getFullYear(), firstMondayOfYear.getMonth(), firstMondayOfYear.getDate() + (weekNumber - 1) * 7);

    // 5. تاريخ آخر يوم في الأسبوع هو ببساطة أول يوم في الأسبوع + 6 أيام.
    const lastDayOfWeek = new Date(firstDayOfWeek.getFullYear(), firstDayOfWeek.getMonth(), firstDayOfWeek.getDate() + 6);

    return {
        firstDay: firstDayOfWeek,
        lastDay: lastDayOfWeek
    };
}

// مثال على الاستخدام:
// لنفترض أننا حصلنا على chossyear و chossweek من الصفحة السابقة
// let chosenYear = 2025; // مثال
// let chosenWeek = 23;  // مثال (الأسبوع الحالي حسب تاريخ اليوم)

// إذا كنت تستخدم query parameters
const urlParams = new URLSearchParams(window.location.search);
const chosenYear = parseInt(urlParams.get('year'));
const chosenWeek = parseInt(urlParams.get('week'));

// تحقق من أن القيم صالحة
if (!isNaN(chosenYear) && !isNaN(chosenWeek)) {
    const weekDates = getWeekRangeDates(chosenYear, chosenWeek);

    console.log(`السنة: ${chosenYear}, الأسبوع: ${chosenWeek}`);
    console.log(`أول يوم في الأسبوع: ${weekDates.firstDay.toLocaleDateString('ar-EG', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}`);
    console.log(`آخر يوم في الأسبوع: ${weekDates.lastDay.toLocaleDateString('ar-EG', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}`);

    // يمكنك الآن استخدام weekDates.firstDay و weekDates.lastDay
    // لتحديث واجهة المستخدم في صفحتك الجديدة.
    // مثال:
    // document.getElementById('weekStart').textContent = weekDates.firstDay.toLocaleDateString();
    // document.getElementById('weekEnd').textContent = weekDates.lastDay.toLocaleDateString();

} else {
    console.warn("لم يتم تمرير Year أو WeekNumber بشكل صحيح إلى الصفحة.");
}
            yearh.textContent= chossyear;
            monthh.textContent= chossemonth;
            weekh.textContent= chossweek;
            dayh.textContent= chossday;

        

            // تخزين المتغيرات في Local Storage
    localStorage.setItem('chosenYear', chossyear);
    localStorage.setItem('chosenMonth', chossemonth);
    localStorage.setItem('chosenDay', chossday);
    localStorage.setItem('chosenWeek', chossweek);

    localStorage.setItem('choseStartDay', XstarDay);
    localStorage.setItem('choseStartMonth', XstarMonth);
    localStorage.setItem('choseStartYear', XstarYear);
    localStorage.setItem('choseEndDay', XendDay);
    localStorage.setItem('choseEndMonth', XendMonth);
    localStorage.setItem('choseEndYear', XendYear);

    // إذا كنت تريد تخزينها ككائن واحد (أفضل للمتغيرات المتعددة):
    const chosenDateData = {
        year: chossyear,
        month: chossemonth,
        day: chossday,
        week: chossweek,

        ystartday: XstarDay,
        ystartmonth: XstarMonth,
        ystartyear: XstarYear,
        yendday: XendDay,
        yendmonth: XendMonth,
        yendyear: XendYear
    };
    localStorage.setItem('chosenDate', JSON.stringify(chosenDateData)); // يجب تحويل الكائن إلى string
    

            document.location='week_mainten_motors.php';
            console.log(`Year: ${chossyear}, Month: ${chossemonth}, Day: ${chossday}, Week: ${chossweek},Start Day: ${XstarDay}, Start Month: ${XstarMonth}, Start Year: ${XstarYear}, End Day: ${XendDay}, End Month: ${XendMonth}, End Year: ${XendYear}`);
            // هنا يمكنك تنفيذ أي كود إضافي بناءً على اليوم المحدد
        });
    });
    
}
function addDayClickListeners3() {
    document.querySelectorAll('.calendar-day').forEach(dayElement => {
        dayElement.addEventListener('click', function() {
            // إزالة التحديد من اليوم السابق (إذا وجد)
            const previouslySelected = document.querySelector('.calendar-day.selected');
            if (previouslySelected) {
                previouslySelected.classList.remove('selected');
            }

            // إضافة التحديد لليوم الحالي
            this.classList.add('selected');

            // حفظ معلومات اليوم المحدد في المتغيرات المطلوبة
            chossyear = parseInt(this.dataset.year);
            chossemonth = parseInt(this.dataset.month);
            chossday = parseInt(this.dataset.day);
             chossweek = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).weekNo;
            XstarDay = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).startDay;
            XstarMonth = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).startMonth;
            XstarYear = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).startYear;
            XendDay = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).endDay;
            XendMonth = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).endMonth;
            XendYear = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).endYear;
            /**
 * تحسب أول وآخر يوم في أسبوع معين (بناءً على معيار ISO 8601: يبدأ الأسبوع يوم الاثنين).
 * @param {number} year السنة.
 * @param {number} weekNumber رقم الأسبوع (1-53).
 * @returns {object} كائن يحتوي على تاريخ بدء الأسبوع وتاريخ نهاية الأسبوع.
 */
function getWeekRangeDates(year, weekNumber) {
    // 1. نبدأ بـ 4 يناير من السنة المعطاة، لأنه وفقًا لمعيار ISO 8601،
    // الأسبوع الأول من السنة هو الأسبوع الذي يحتوي على 4 يناير.
    const jan4 = new Date(year, 0, 4); // Month is 0-indexed, so 0 is January

    // 2. نحسب رقم اليوم في الأسبوع لـ 4 يناير (0 = الأحد، 1 = الاثنين، وهكذا).
    // نحتاج لجعل الأحد (0) يكون 7 ليتوافق مع الحساب.
    const jan4Day = (jan4.getDay() === 0) ? 7 : jan4.getDay(); // 1 = الاثنين, 7 = الأحد

    // 3. نحسب يوم الاثنين الأول في تلك السنة (أو يوم الاثنين الأخير من السنة السابقة إذا كان 1 يناير يوم جمعة/سبت/أحد).
    // نطرح عدد الأيام من 4 يناير للوصول إلى يوم الاثنين الذي يسبقه أو يساويه.
    const firstMondayOfYear = new Date(jan4.getFullYear(), 0, 4 - jan4Day + 1);

    // 4. الآن، نحسب تاريخ أول يوم في الأسبوع المطلوب.
    // الأسبوع `weekNumber` يبدأ بعد (weekNumber - 1) * 7 أيام من أول يوم اثنين في السنة.
    const firstDayOfWeek = new Date(firstMondayOfYear.getFullYear(), firstMondayOfYear.getMonth(), firstMondayOfYear.getDate() + (weekNumber - 1) * 7);

    // 5. تاريخ آخر يوم في الأسبوع هو ببساطة أول يوم في الأسبوع + 6 أيام.
    const lastDayOfWeek = new Date(firstDayOfWeek.getFullYear(), firstDayOfWeek.getMonth(), firstDayOfWeek.getDate() + 6);

    return {
        firstDay: firstDayOfWeek,
        lastDay: lastDayOfWeek
    };
}

// مثال على الاستخدام:
// لنفترض أننا حصلنا على chossyear و chossweek من الصفحة السابقة
// let chosenYear = 2025; // مثال
// let chosenWeek = 23;  // مثال (الأسبوع الحالي حسب تاريخ اليوم)

// إذا كنت تستخدم query parameters
const urlParams = new URLSearchParams(window.location.search);
const chosenYear = parseInt(urlParams.get('year'));
const chosenWeek = parseInt(urlParams.get('week'));

// تحقق من أن القيم صالحة
if (!isNaN(chosenYear) && !isNaN(chosenWeek)) {
    const weekDates = getWeekRangeDates(chosenYear, chosenWeek);

    console.log(`السنة: ${chosenYear}, الأسبوع: ${chosenWeek}`);
    console.log(`أول يوم في الأسبوع: ${weekDates.firstDay.toLocaleDateString('ar-EG', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}`);
    console.log(`آخر يوم في الأسبوع: ${weekDates.lastDay.toLocaleDateString('ar-EG', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}`);

    // يمكنك الآن استخدام weekDates.firstDay و weekDates.lastDay
    // لتحديث واجهة المستخدم في صفحتك الجديدة.
    // مثال:
    // document.getElementById('weekStart').textContent = weekDates.firstDay.toLocaleDateString();
    // document.getElementById('weekEnd').textContent = weekDates.lastDay.toLocaleDateString();

} else {
    console.warn("لم يتم تمرير Year أو WeekNumber بشكل صحيح إلى الصفحة.");
}
            yearh.textContent= chossyear;
            monthh.textContent= chossemonth;
            weekh.textContent= chossweek;
            dayh.textContent= chossday;

            // تخزين المتغيرات في Local Storage
    localStorage.setItem('chosenYear', chossyear);
    localStorage.setItem('chosenMonth', chossemonth);
    localStorage.setItem('chosenDay', chossday);
    localStorage.setItem('chosenWeek', chossweek);

    // إذا كنت تريد تخزينها ككائن واحد (أفضل للمتغيرات المتعددة):
    const chosenDateData = {
        year: chossyear,
        month: chossemonth,
        day: chossday,
        week: chossweek
    };
    localStorage.setItem('chosenDate', JSON.stringify(chosenDateData)); // يجب تحويل الكائن إلى string
    

            document.location='show_transformer_week_group_a.php';
            console.log(`Year: ${chossyear}, Month: ${chossemonth}, Day: ${chossday}, Week: ${chossweek}`);
            // هنا يمكنك تنفيذ أي كود إضافي بناءً على اليوم المحدد
        });
    });
    
}

function addDayClickListeners4() {
    document.querySelectorAll('.calendar-day').forEach(dayElement => {
        dayElement.addEventListener('click', function() {
            // إزالة التحديد من اليوم السابق (إذا وجد)
            const previouslySelected = document.querySelector('.calendar-day.selected');
            if (previouslySelected) {
                previouslySelected.classList.remove('selected');
            }

            // إضافة التحديد لليوم الحالي
            this.classList.add('selected');

            // حفظ معلومات اليوم المحدد في المتغيرات المطلوبة
            chossyear = parseInt(this.dataset.year);
            chossemonth = parseInt(this.dataset.month);
            chossday = parseInt(this.dataset.day);
            chossweek = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).weekNo;
            XstarDay = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).startDay;
            XstarMonth = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).startMonth;
            XstarYear = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).startYear;
            XendDay = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).endDay;
            XendMonth = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).endMonth;
            XendYear = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday)).endYear;
            
            /**
 * تحسب أول وآخر يوم في أسبوع معين (بناءً على معيار ISO 8601: يبدأ الأسبوع يوم الاثنين).
 * @param {number} year السنة.
 * @param {number} weekNumber رقم الأسبوع (1-53).
 * @returns {object} كائن يحتوي على تاريخ بدء الأسبوع وتاريخ نهاية الأسبوع.
 */
function getWeekRangeDates(year, weekNumber) {
    // 1. نبدأ بـ 4 يناير من السنة المعطاة، لأنه وفقًا لمعيار ISO 8601،
    // الأسبوع الأول من السنة هو الأسبوع الذي يحتوي على 4 يناير.
    const jan4 = new Date(year, 0, 4); // Month is 0-indexed, so 0 is January

    // 2. نحسب رقم اليوم في الأسبوع لـ 4 يناير (0 = الأحد، 1 = الاثنين، وهكذا).
    // نحتاج لجعل الأحد (0) يكون 7 ليتوافق مع الحساب.
    const jan4Day = (jan4.getDay() === 0) ? 7 : jan4.getDay(); // 1 = الاثنين, 7 = الأحد

    // 3. نحسب يوم الاثنين الأول في تلك السنة (أو يوم الاثنين الأخير من السنة السابقة إذا كان 1 يناير يوم جمعة/سبت/أحد).
    // نطرح عدد الأيام من 4 يناير للوصول إلى يوم الاثنين الذي يسبقه أو يساويه.
    const firstMondayOfYear = new Date(jan4.getFullYear(), 0, 4 - jan4Day + 1);

    // 4. الآن، نحسب تاريخ أول يوم في الأسبوع المطلوب.
    // الأسبوع `weekNumber` يبدأ بعد (weekNumber - 1) * 7 أيام من أول يوم اثنين في السنة.
    const firstDayOfWeek = new Date(firstMondayOfYear.getFullYear(), firstMondayOfYear.getMonth(), firstMondayOfYear.getDate() + (weekNumber - 1) * 7);

    // 5. تاريخ آخر يوم في الأسبوع هو ببساطة أول يوم في الأسبوع + 6 أيام.
    const lastDayOfWeek = new Date(firstDayOfWeek.getFullYear(), firstDayOfWeek.getMonth(), firstDayOfWeek.getDate() + 6);

    return {
        firstDay: firstDayOfWeek,
        lastDay: lastDayOfWeek
    };
}

// مثال على الاستخدام:
// لنفترض أننا حصلنا على chossyear و chossweek من الصفحة السابقة
// let chosenYear = 2025; // مثال
// let chosenWeek = 23;  // مثال (الأسبوع الحالي حسب تاريخ اليوم)

// إذا كنت تستخدم query parameters
const urlParams = new URLSearchParams(window.location.search);
const chosenYear = parseInt(urlParams.get('year'));
const chosenWeek = parseInt(urlParams.get('week'));

// تحقق من أن القيم صالحة
if (!isNaN(chosenYear) && !isNaN(chosenWeek)) {
    const weekDates = getWeekRangeDates(chosenYear, chosenWeek);

    console.log(`السنة: ${chosenYear}, الأسبوع: ${chosenWeek}`);
    console.log(`أول يوم في الأسبوع: ${weekDates.firstDay.toLocaleDateString('ar-EG', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}`);
    console.log(`آخر يوم في الأسبوع: ${weekDates.lastDay.toLocaleDateString('ar-EG', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}`);

    // يمكنك الآن استخدام weekDates.firstDay و weekDates.lastDay
    // لتحديث واجهة المستخدم في صفحتك الجديدة.
    // مثال:
    // document.getElementById('weekStart').textContent = weekDates.firstDay.toLocaleDateString();
    // document.getElementById('weekEnd').textContent = weekDates.lastDay.toLocaleDateString();

} else {
    console.warn("لم يتم تمرير Year أو WeekNumber بشكل صحيح إلى الصفحة.");
}
            yearh.textContent= chossyear;
            monthh.textContent= chossemonth;
            weekh.textContent= chossweek;
            dayh.textContent= chossday;

            

            // تخزين المتغيرات في Local Storage
    localStorage.setItem('chosenYear', chossyear);
    localStorage.setItem('chosenMonth', chossemonth);
    localStorage.setItem('chosenDay', chossday);
    localStorage.setItem('chosenWeek', chossweek);

    

    // إذا كنت تريد تخزينها ككائن واحد (أفضل للمتغيرات المتعددة):
    const chosenDateData = {
        year: chossyear,
        month: chossemonth,
        day: chossday,
        week: chossweek
    };
    localStorage.setItem('chosenDate', JSON.stringify(chosenDateData)); // يجب تحويل الكائن إلى string
    

            document.location='week_mainten_transformer.php';
            console.log(`Year: ${chossyear}, Month: ${chossemonth}, Day: ${chossday}, Week: ${chossweek}`);
            // هنا يمكنك تنفيذ أي كود إضافي بناءً على اليوم المحدد
        });
    });
    
}

// استدعاء الدالة عند تحميل الصفحة أو عندما تحتاج إلى إظهار التقويم
// يمكنك وضع هذا في حدث DOMContentLoaded لضمان تحميل جميع العناصر
document.addEventListener('DOMContentLoaded', display_date);

// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%     كود عرض التاريخ       %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

function display_datexxxxxxxxxx(){
    let dateshow = document.getElementById('dateshow');
    
    display_date();
    dateshow.style.visibility = 'visible';
    dateshow.style.display = 'block';
}

function display_datexxxxxxxxxx2(){
    let dateshow = document.getElementById('dateshow');
    
    display_date2();
    dateshow.style.visibility = 'visible';
    dateshow.style.display = 'block';
}


function display_datexxxxxxxxxx3(){
    document.location='show_transformer_week_group_a.php';
}
function display_datexxxxxxxxxx4(){
    document.location='week_mainten_transformer.php';
}
let btn_Select = "";
if (print_motors_table) {
    btn_Select="1";
    print_motors_table.addEventListener('click', display_datexxxxxxxxxx);
    
}

if (maintenance_motors_table) {
    btn_Select="2";
    maintenance_motors_table.addEventListener('click', display_datexxxxxxxxxx2);
    
}

if (print_transformer_table) {
     btn_Select="3";
    print_transformer_table.addEventListener('click', display_datexxxxxxxxxx3);
    
}

if (maintenance_transformer_table) {
     btn_Select="4";
    maintenance_transformer_table.addEventListener('click', display_datexxxxxxxxxx4);
    
}



document.addEventListener('DOMContentLoaded', function() {
    // ... (الكود الموجود لديك مسبقاً) ...

    const savePdfBtn = document.getElementById('savePdfBtn');
    if (savePdfBtn) {
        savePdfBtn.addEventListener('click', function() {
            const element = document.querySelector('.container1'); // أو العنصر الذي يحتوي على الجدول الخاص بك
            const opt = {
                margin: 0.5,
                filename: 'تقرير_المحول_' + displayMonthSpan.textContent + '_' + displayYearSpan.textContent + '_' + displayTransformerSpan.textContent + '.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2, logging: true, dpi: 192, letterRendering: true },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' } // يمكن تغيير orientation إلى 'portrait'
            };
            html2pdf().set(opt).from(element).save();
        });
    }
});




});