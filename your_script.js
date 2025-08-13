document.addEventListener('DOMContentLoaded', function() {
    // ... (الكود الحالي لـ JavaScript الخاص بك، مثل تهيئة القيم، ومعالجات الأحداث الأخرى) ...

    // الحصول على مرجع لزر حفظ الـ PDF وعنصر مؤشر التحميل (إذا استخدمته)
    const savePdfBtn = document.getElementById('savePdfBtn');
    // إذا كنت قد أضفت مؤشر تحميل، قم بالحصول على المرجع له هنا:
    const pdfLoadingIndicator = document.getElementById('pdfLoadingIndicator'); // تأكد من وجود هذا العنصر في HTML

    // التأكد من أن الزر موجود قبل إضافة معالج الحدث
    if (savePdfBtn) {
        savePdfBtn.addEventListener('click', function() {
            // 1. إظهار مؤشر التحميل وتعطيل الزر لمنع النقرات المتعددة
            if (pdfLoadingIndicator) {
                pdfLoadingIndicator.style.display = 'inline'; // أظهر المؤشر
            }
            savePdfBtn.disabled = true; // عطل الزر

            console.log("بدء عملية حفظ PDF..."); // لغرض التصحيح في وحدة تحكم المطور

            // 2. تحديد العنصر المراد تحويله
            // هذا يجب أن يكون الـ 'div' أو العنصر الأب الذي يحتوي على جدولك
            const elementToPrint = document.querySelector('.container1'); 
            
            // التحقق إذا تم العثور على العنصر
            if (!elementToPrint) {
                console.error("خطأ: العنصر الذي يحتوي على محتوى التقرير ('.container1') لم يتم العثور عليه.");
                alert("تعذر حفظ التقرير: العنصر الأساسي غير موجود.");
                // إعادة الزر والمؤشر لحالتهما الأصلية
                if (pdfLoadingIndicator) pdfLoadingIndicator.style.display = 'none';
                savePdfBtn.disabled = false;
                return; // إيقاف التنفيذ
            }
            
            console.log("تم العثور على العنصر المستهدف للتحويل:", elementToPrint);

            // 3. تعريف خيارات التحويل (مهمة جدًا لضبط المظهر)
            const pdfOptions = {
                margin: 0.5, // الهوامش بالبوصة (أعلى، أسفل، يسار، يمين)
                filename: 'تقرير_المحول_' + displayMonthSpan.textContent + '_' + displayYearSpan.textContent + '_' + displayTransformerSpan.textContent + '.pdf',
                image: { type: 'jpeg', quality: 0.98 }, // جودة الصورة (إذا كانت الصفحة تحتوي على صور)
                html2canvas: { 
                    scale: 2, // مهم: يزيد الدقة (كلما زادت القيمة، زادت الدقة ولكن يزداد وقت المعالجة)
                    logging: true, // لإظهار رسائل تصحيح الأخطاء في وحدة التحكم للمطور
                    dpi: 192, // نقطة في البوصة
                    letterRendering: true // لتحسين عرض الخطوط
                },
                jsPDF: { 
                    unit: 'in', // وحدة القياس (بوصة)
                    format: 'letter', // حجم الصفحة (يمكنك استخدام 'a4' أو غيرها)
                    orientation: 'landscape' // اتجاه الصفحة ('portrait' للعمودي، 'landscape' للأفقي)
                }
            };
            
            console.log("خيارات PDF المعرفة:", pdfOptions);

            // 4. بدء عملية التحويل والحفظ
            html2pdf()
                .set(pdfOptions) // تطبيق الخيارات
                .from(elementToPrint) // تحديد العنصر الذي سيتم تحويله
                .save() // بدء عملية الحفظ والتنزيل التلقائي
                .then(() => {
                    // هذا الجزء يتم تنفيذه بعد اكتمال عملية الحفظ بنجاح
                    console.log("تم حفظ ملف PDF بنجاح!");
                    alert("تم حفظ ملف PDF بنجاح!");
                })
                .catch(error => {
                    // هذا الجزء يتم تنفيذه إذا حدث خطأ أثناء عملية الحفظ
                    console.error("حدث خطأ أثناء حفظ ملف PDF:", error);
                    alert("حدث خطأ أثناء حفظ ملف PDF: " + error.message);
                })
                .finally(() => {
                    // هذا الجزء يتم تنفيذه دائمًا سواء نجحت العملية أو فشلت
                    if (pdfLoadingIndicator) {
                        pdfLoadingIndicator.style.display = 'none'; // إخفاء المؤشر
                    }
                    savePdfBtn.disabled = false; // تفعيل الزر مرة أخرى
                    console.log("انتهت عملية حفظ PDF.");
                });
        });
    }

    
});