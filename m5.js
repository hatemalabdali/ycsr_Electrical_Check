// نقوم أولاً بتحديد الجدول الرابع
const fourthTable = document.querySelector('table:nth-of-type(4)');
// ثم نحدد جميع الصفوف التي تحتوي على بيانات (باستثناء الصفوف الأخيرة التي لا تحتوي على بيانات فحص)
const allRows = fourthTable.querySelectorAll('tbody tr:not(:nth-last-child(-n+3))');

// نجهز مصفوفتين لتخزين البيانات
const stateData = [];
const maintenanceData = [];

// نستخدم حلقة forEach للمرور على كل صف من الصفوف
allRows.forEach(row => {
    const cells = row.querySelectorAll('td');

    // التأكد من وجود الخلية في العمود الثاني قبل محاولة قراءتها
    if (cells[1]) {
        // قراءة قيمة الخلية في العمود الثاني وتخزينها في مصفوفة stateData
        stateData.push(cells[1].textContent.trim());
    }

    // التأكد من وجود الخلية في العمود الخامس قبل محاولة قراءتها
    if (cells[4]) {
        // قراءة قيمة الخلية في العمود الخامس وتخزينها في مصفوفة maintenanceData
        maintenanceData.push(cells[4].textContent.trim());
    }
});

// هنا نقوم بتكوين الكائن postData الذي سيتم إرساله
const postData = {
    // ... (هنا يمكنك إضافة أي بيانات أخرى مثل السنة والقاطع)
    inspectionData: {
        state: stateData, // مصفوفة القيم من العمود الثاني
        maintenance: maintenanceData // مصفوفة القيم من العمود الخامس
    }
};

// الآن يمكنك إرسال postData باستخدام fetch
// fetch('save_data.php', { ... });