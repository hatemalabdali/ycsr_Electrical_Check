document.addEventListener('DOMContentLoaded', function() {
    // ... (الكود الحالي لـ JavaScript الخاص بك من بداية الدالة) ...
    // ... (مثل استرجاع المتغيرات من Local Storage، تعريف tyear, tmonth, إلخ.) ...

    const year = localStorage.getItem('chosenYear');
    const month = localStorage.getItem('chosenMonth');
    const week = localStorage.getItem('chosenWeek');
    const day = localStorage.getItem('chosenDay');

    let tyear = document.getElementById('tyear');
    let tmonth = document.getElementById('tmonth');
    let tweek = document.getElementById('tweek');
    let tday = document.getElementById('tday');
    let year_label = document.getElementById('year_label');
    let year_labe2 = document.getElementById('year_labe2');

    tyear.value = year;
    tmonth.value = month;
    tweek.value = week;
    tday.value = day;

    let month_label = document.getElementById('month_label');
    let month_labe2 = document.getElementById('month_labe2');
    let day_label = document.getElementById('day_label');
    let day_labe2 = document.getElementById('day_labe2');

    let Periodic_date = document.getElementById('Periodic_date');
    let to = document.getElementById('to');

    month_label.textContent = month;
    month_labe2.textContent = month;
    year_label.textContent = year;
    year_labe2.textContent = year;

    // ////////////////////////////////////
    // الكود الخاص بـ getWeekRangeDates وتحديث التواريخ
    // هذا الجزء من الكود يجب أن يكون ضمن الـ DOMContentLoaded الرئيسي
    const urlParams = new URLSearchParams(window.location.search);
    const urlYear = parseInt(urlParams.get('year'));
    const urlWeek = parseInt(urlParams.get('week'));

    if (!isNaN(urlYear) && !isNaN(urlWeek)) {
        const weekDates = getWeekRangeDates(urlYear, urlWeek);
        
        // تحديث نص day_label و day_labe2 بقيم اليوم من الدالة
        day_label.textContent = weekDates.firstDay.getDate();
        day_labe2.textContent = weekDates.lastDay.getDate();

        // تحديث month_label و month_labe2 بشكل صحيح بناءً على الأيام
        // يجب أن نستخدم الشهر الفعلي من كائن Date وليس فقط المتغير 'month' العام
        month_label.textContent = weekDates.firstDay.getMonth() + 1; // +1 لأن الشهر يبدأ من 0
        month_labe2.textContent = weekDates.lastDay.getMonth() + 1;

        console.log(`تم استلام السنة: ${urlYear}, الأسبوع: ${urlWeek}`);
        console.log('أول يوم في الأسبوع:', weekDates.firstDay);
        console.log('آخر يوم في الأسبوع:', weekDates.lastDay);
    } else {
        console.warn("خطأ: لم يتم العثور على قيم السنة أو الأسبوع في الرابط.");
    }
    // ///////////////////////////////////

    // الدالة getWeekRangeDates يجب أن تكون معرفة خارج الـ DOMContentLoaded إذا كانت تستخدمها أماكن أخرى،
    // أو داخلها إذا كانت تستخدم هنا فقط.
    function getWeekRangeDates(year, weekNumber) {
        const jan4 = new Date(year, 0, 4);
        const jan4Day = (jan4.getDay() === 0) ? 7 : jan4.getDay();
        const firstMondayOfYear = new Date(jan4.getFullYear(), 0, 4 - jan4Day + 1);

        const firstDayOfWeek = new Date(firstMondayOfYear.getFullYear(), firstMondayOfYear.getMonth(), firstMondayOfYear.getDate() + (weekNumber - 1) * 7);
        const lastDayOfWeek = new Date(firstDayOfWeek.getFullYear(), firstDayOfWeek.getMonth(), firstDayOfWeek.getDate() + 6);

        return {
            firstDay: firstDayOfWeek,
            lastDay: lastDayOfWeek
        };
    }
    // ///////////////////////////////////

    // هذا الجزء من الكود للتحقق من الأيام يجب أن يعتمد على القيم المحدثة
    // (day_label.textContent, day_labe2.textContent)
    // وليس على المتغير 'day' القديم
    if (parseInt(day_label.textContent) > parseInt(day_labe2.textContent)) { // إذا كان يوم البداية أكبر من يوم النهاية (يعني عبور شهر)
        // يجب أن نتحقق من الشهر والسنة من كائن Date
        // إذا كان الشهر مختلفاً، فهذا الكود يحتاج لإعادة تقييم بناءً على كيفية تحديث month_label و year_label
        // الأفضل هو تحديث month_label و year_label مباشرةً من كائن التاريخ (weekDates.firstDay و weekDates.lastDay)
    }

    // هنا يجب أن تقوم بتحديث month_label.textContent و year_label.textContent
    // بناءً على month_label.textContent و month_labe2.textContent المحدثين من getWeekRangeDates
    if (parseInt(month_label.textContent) === 0) {
        month_label.textContent = 12;
    }
    if (parseInt(month_labe2.textContent) === 13) {
        month_labe2.textContent = 1;
    }

    const chosenDateString = localStorage.getItem('chosenDate');
    if (chosenDateString) {
        const chosenDateData = JSON.parse(chosenDateString);
        console.log("Received data from Local Storage:");
        console.log(`Year: ${chosenDateData.year}, Month: ${chosenDateData.month}, Day: ${chosenDateData.day}, Week: ${chosenDateData.week}`);
    }

    // //////////////////////////////////////////////////
    // كود حفظ الـ PDF المحدث
    // //////////////////////////////////////////////////

    // الحصول على مرجع لزر حفظ الـ PDF
    // تم تغيير 'savePdfBtn' إلى 'savePdfBtn2' ليتوافق مع HTML
    const savePdfBtn = document.getElementById('savePdfBtn2'); 
    
    // مؤشر التحميل (إذا استخدمته، تأكد من وجوده في HTML)
    // يمكنك إضافة <span id="pdfLoadingIndicator" style="display: none; margin-left: 5px;">...جاري الحفظ</span> داخل الزر
    const pdfLoadingIndicator = document.getElementById('pdfLoadingIndicator'); 

    if (savePdfBtn) {
        savePdfBtn.addEventListener('click', function() {
            if (pdfLoadingIndicator) {
                pdfLoadingIndicator.style.display = 'inline'; // إظهار المؤشر
            }
            savePdfBtn.disabled = true; // تعطيل الزر

            console.log("بدء عملية حفظ PDF...");

            // **التصحيح هنا:** استهداف .container3 بدلاً من .container1
            const elementToPrint = document.querySelector('.container3'); 
             
            
            if (!elementToPrint) {
                console.error("خطأ: العنصر الذي يحتوي على محتوى التقرير ('.container3') لم يتم العثور عليه.");
                alert("تعذر حفظ التقرير: العنصر الأساسي غير موجود.");
                if (pdfLoadingIndicator) pdfLoadingIndicator.style.display = 'none';
                savePdfBtn.disabled = false;
                return;
            }
            
            console.log("تم العثور على العنصر المستهدف للتحويل:", elementToPrint);

            // بناء اسم الملف ديناميكيًا باستخدام القيم الصحيحة من صفحتك
            // استخدم textContent للعناصر التي تعرض القيم
            const groupName = document.getElementById('grooop') ? document.getElementById('grooop').textContent.replace('REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST', '').trim() : 'Group';
            const fileName = `تقرير_المحركات_${year_label.textContent}_${month_label.textContent}_الأسبوع_${urlWeek}_${groupName}.pdf`;

            const pdfOptions = {
                margin: 0.5,
                filename: fileName, // اسم الملف الديناميكي
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { 
                    scale: 2, 
                    logging: true, 
                    dpi: 192, 
                    letterRendering: true 
                },
                jsPDF: { 
                    unit: 'in', 
                    format: 'letter', 
                    orientation: 'landscape' // أو 'portrait' حسب تفضيلك
                }
            };
            
            console.log("خيارات PDF المعرفة:", pdfOptions);

            html2pdf()
                .set(pdfOptions)
                .from(elementToPrint )
                
                .save()
                .then(() => {
                    console.log("تم حفظ ملف PDF بنجاح!");
                    alert("تم حفظ ملف PDF بنجاح!");
                })
                .catch(error => {
                    console.error("حدث خطأ أثناء حفظ ملف PDF:", error);
                    alert("حدث خطأ أثناء حفظ ملف PDF: " + error.message);
                })
                .finally(() => {
                    if (pdfLoadingIndicator) {
                        pdfLoadingIndicator.style.display = 'none';
                    }
                    savePdfBtn.disabled = false;
                    console.log("انتهت عملية حفظ PDF.");
                });
        });
    }

    // //////////////////////////////////////////////////
    // كود PHP و HTML متبقي... (لا تغيره هنا)
    // //////////////////////////////////////////////////

    // هذا الكود يمكن أن يكون خارج DOMContentLoaded
    let tail = document.getElementById('tail');
    let btn = document.getElementById('btn');
    let motors_groups = document.getElementById('motors_groups');

    // باقي الكود الخاص بـ motors_groups و btn و handleExitClick
    // تأكد أن هذا الكود موجود بالفعل في ملف JavaScript الخاص بك
    // ...

    motors_groups.addEventListener('change', function() {
        let selectedValue = this.value;
        let grooop = document.getElementById('grooop');
        if (selectedValue === "group_a") {
            grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( A )';
        } else if (selectedValue === "group_a1") {
            grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( A1 )';
        } else if (selectedValue === "group_a2") {
            grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( A2 )';
        } else if (selectedValue === "group_b") {
            grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( B )';
        } else if (selectedValue === "group_b1") {
            grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( B1 )';
        } else if (selectedValue === "group_c") {
            grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( C )';
        } else if (selectedValue === "group_c1") {
            grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( C1 )';
        }
        btn.click();
        localStorage.setItem('lastSelectedMotorGroup', selectedValue);
        console.log('تم تخزين القيمة:', selectedValue);
    });

    // هذا الكود أيضاً يمكن أن يكون داخل DOMContentLoaded
    let storedValue = localStorage.getItem('lastSelectedMotorGroup');
    if (storedValue) {
        motors_groups.value = storedValue;
        let grooop = document.getElementById('grooop');
        if (storedValue === "group_a") {
            grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( A )';
        } else if (storedValue === "group_a1") {
            grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( A1 )';
        } else if (storedValue === "group_a2") {
            grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( A2 )';
        } else if (storedValue === "group_b") {
            grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( B )';
        } else if (storedValue === "group_b1") {
            grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( B1 )';
        } else if (storedValue === "group_c") {
            grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( C )';
        } else if (storedValue === "group_c1") {
            grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( C1 )';
        }
        console.log('تم استعادة القيمة:', storedValue);
    }

    btn.addEventListener("click", myFunction);

    function myFunction() {
        tail.style.visibility = "visible";
    }

    function handleExitClick(event) {
        event.preventDefault();
        document.location = 'weekly_motors.php';
    }

    // تأكد من تعريف tail إذا لم يكن معرفاً بالفعل
    // let tail = document.getElementById('tail'); // إذا لم يتم تعريفه في نطاق أوسع
});

