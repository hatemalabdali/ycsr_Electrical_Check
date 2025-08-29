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
    // تتطلب دالة لحساب رقم الأسبوع في السنة
    // هذا مثال بسيط وغير دقيق لبعض أنظمة حساب الأسبوع (مثل ISO 8601)
    // قد تحتاج إلى مكتبة خارجية للحصول على حساب دقيق
    d = new Date(Date.UTC(d.getFullYear(), d.getMonth(), d.getDate()));
    d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay() || 7));
    const yearStart = new Date(Date.UTC(d.getUTCFullYear(), 0, 1));
    const weekNo = Math.ceil((((d - yearStart) / 86400000) + 1) / 7);
    return weekNo;
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
            chossweek = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday));
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

    // إذا كنت تريد تخزينها ككائن واحد (أفضل للمتغيرات المتعددة):
    const chosenDateData = {
        year: chossyear,
        month: chossemonth,
        day: chossday,
        week: chossweek
    };
    localStorage.setItem('chosenDate', JSON.stringify(chosenDateData)); // يجب تحويل الكائن إلى string

            
     

            
            document.location='show_moror_week_group_a.php';
          
            console.log(`Year: ${chossyear}, Month: ${chossemonth}, Day: ${chossday}, Week: ${chossweek}`);
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
            chossweek = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday));
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
    

            document.location='week_mainten_motors.php';
            console.log(`Year: ${chossyear}, Month: ${chossemonth}, Day: ${chossday}, Week: ${chossweek}`);
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
            chossweek = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday));
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
            chossweek = getWeekNumber(new Date(chossyear, chossemonth - 1, chossday));
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
}

function display_datexxxxxxxxxx2(){
    let dateshow = document.getElementById('dateshow');
    
    display_date2();
    dateshow.style.visibility = 'visible';
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