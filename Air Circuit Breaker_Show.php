<?php
// يجب أن يكون هذا السطر في أعلى الملف قبل أي محتوى HTML
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Circuit Breaker Inspection Checklist</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
            vertical-align: middle;
            font-size: 14px;
        }

        .left-align {
            text-align: left;
        }

        .right-align {
            text-align: right;
        }

        .arabic-text {
            direction: rtl;
        }

        table img.imgx {
            width: 100px;
            height: 100px;
        }

        table .tdimg {
            text-align: center;
            width: 10%;
        }

        .blue_color {
            color: #0052ED;
        }

        /* سمات السيلكتور جروب وزر العودة */
        .select-container {
            position: relative;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border: 1px solid #e0e0e0;
            width: 20%;
            margin-left: 5%;
            margin-top: 0.2%;
            display: flex;
        }

        .select-label {
            font-size: 16px;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        .custom-select {
            width: 100%;
            padding: 10px 15px;
            font-size: 16px;
            color: #333;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 6px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .custom-select:hover {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        .custom-select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* تنسيق أسهم القائمة المنسدلة */
        .select-container::after {
            content: '\25BC';
            /* سهم للأسفل */
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(20%);
            font-size: 12px;
            color: #555;
            pointer-events: none;
            transition: transform 0.3s ease;
        }

        .custom-select:focus+.select-container::after {
            transform: translateY(20%) rotate(180deg);
        }

        /* تنسيق الخيارات */
        .custom-select option {
            padding: 10px;
            font-size: 16px;
            background-color: #fff;
            color: #333;
        }

        .top_div {
            display: flex;
            justify-content: space-between;
            background-color: bisque;
        }

        .back-btn {
            padding-top: 2%;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            margin-right: 5%;
            padding-left: 1%;
            padding-right: 1%;
        }

        form {
            width: 100%;
            display: flex;
            justify-content: space-between;
            background-color: bisque;
        }
    </style>
</head>

<body>
    <div class="top_div">

        <a href="Air_Circuit_Breakers.php" class="back-btn">العودة للصفحة السابقة</a>

        <div class="select-container">
            <label for="year-select" class="select-label">اختر السنة:</label>
            <select id="year-select" name="year-select" class="custom-select">
                <option value="" disabled selected>-- اختر سنة --</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>
            </select>
        </div>

        <div class="select-container">
            <label for="breaker-select" class="select-label">اختر القاطع:</label>
            <select id="breaker-select" name="breaker-select" class="custom-select">
                <option value="ACB_MCC1">ACB_MCC1</option>
                <option value="ACB_MCC2">ACB_MCC2</option>
                <option value="ACB_MCC5">ACB_MCC5</option>
                <option value="ACB_EME_MCC5">ACB_EME_MCC5</option>
                <option value="ACB_MOT_10_730">ACB_MOT_10-730</option>
                <option value="ACB_MOT_10_740">ACB_MOT_10_740</option>
                <option value="ACB_MCC2B">ACB_MCC2B</option>
                <option value="ACB_REF_MCC2B">ACB_REF_MCC2B</option>
                <option value="ACB_MCC3A">ACB_MCC3A</option>
                <option value="ACB_MCC3C">ACB_MCC3C</option>

                <option value="ACB_RO_TR_OUT">ACB_RO_TR_OUT</option>
                <option value="ACB_RO_TR_Q11">ACB_RO_TR_Q11</option>
                <option value="ACB_RO_TR_Q12">ACB_RO_TR_Q12</option>
                <option value="ACB_RO_TR_Q13">ACB_RO_TR_Q13</option>
                <option value="ACB_RO_TR_Q14">ACB_RO_TR_Q14</option>
                <option value="ACB_RO_TR_Q15">ACB_RO_TR_Q15</option>
                <option value="ACB_RO_TR_Q17">ACB_RO_TR_Q17</option>

                <option value="ACB_SILO_TR_OUT">ACB_SILO_TR_OUT</option>
                <option value="ACB_SILO_Q12">ACB_SILO_Q12</option>
                <option value="ACB_SILO_TR_Q13">ACB_SILO_TR_Q13</option>
                <option value="ACB_RAW_Q14">ACB_RAW_Q14</option>
                <option value="ACB_PACK_COMQ15">ACB_PACK_COMQ15</option>
                <option value="ACB_RAW_LGHT_Q16">ACB_RAW_LGHT_Q16</option>
                <option value="ACB_PACK_LGHT_Q17">ACB_PACK_LGHT_Q17</option>
                <option value="ACB_PACKING_CONV_Q18">ACB_PACKING_CONV_Q18</option>
                <option value="ACB_PACKING_MCC">ACB_PACKING_MCC</option>

                <option value="ACB_GATE_TR_OUT">ACB_GATE_TR_OUT</option>
                <option value="ACB_Q1_GATE_CENTRAL">ACB_Q1_GATE&CENTRAL</option>
                <option value="ACB_Q2_STREET_LIGHT">ACB_Q2_STREET_LIGHT</option>
                <option value="ACB_Q3_CAR_WASH_KURIMI">ACB_Q3_CAR_WASH_KURIMI</option>
                <option value="ACB_Q5_WHEIGHIN">ACB_Q5_WHEIGHIN</option>
                <option value="ACB_Q4_WELL_PUMP3">ACB_Q4_WELL_PUMP3</option>
                <option value="ACB_Q6_WELL_PUMP4">ACB_Q6_WELL_PUMP4</option>

                <option value="ACB_MCC3">ACB_MCC3</option>
                <option value="ACB_MCC3A_CO2">ACB_MCC3A_CO2</option>
                <option value="ACB_MCC3_WORKSH">ACB_MCC3_WORKSH</option>
                <option value="ACB_MCC3A_DMIN-B">ACB_MCC3A_DMIN.B</option>
                <option value="ACB_MCC3_CHALIT">ACB_MCC3_CHALIT</option>
                <option value="ACB_MCC3_EME-DG">ACB_MCC3_EME.DG</option>
                <option value="ACB_MCC3_DCS-LI">ACB_MCC3_DCS.LI</option>
                <option value="ACB_MCC3_AIR-CO">ACB_MCC3_AIR.CO</option>
                <option value="ACB_MCC3_REF-SR">ACB_MCC3_REF.SR</option>

                <option value="ACB_HOME_TR_OUT">ACB_HOME_TR_OUT</option>
                <option value="ACB_HOME_TR-TEC">ACB_HOME_TR.TEC</option>
                <option value="ACB_HOME_ENG">ACB_HOME_ENG</option>
            </select>
        </div>

    </div>
    <script>
        // Set the date automatically when the page loads
        document.addEventListener("DOMContentLoaded", function() {
            const dateCell = document.querySelector(".blue_color tr:nth-child(1) td:nth-child(4)");
            if (dateCell) {
                const today = new Date();
                const day = String(today.getDate()).padStart(2, '0');
                const month = String(today.getMonth() + 1).padStart(2, '0');
                const year = today.getFullYear();
                dateCell.textContent = `${day}/${month}/${year}`;
            }

            // Get the logged-in user's name from the PHP session variable
            const loggedInUser = "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>";

            // Set the logged-in user's name in the "Prepared By" cell
            document.querySelector('table:nth-of-type(1) tr:nth-child(4) td:nth-child(3)').textContent = loggedInUser;
            // Set the logged-in user's name in the "الفحص بواسطة" cell
            document.querySelector('table:nth-of-type(4) tr:nth-last-child(3) td:nth-child(2)').textContent = loggedInUser;
        });

        // الحصول على عناصر القائمة المنسدلة
        const yearSelect = document.getElementById('year-select');
        const breakerSelect = document.getElementById('breaker-select');

        // وظيفة لحفظ القيمة في sessionStorage
        function saveSelection(selectElement) {
            sessionStorage.setItem(selectElement.id, selectElement.value);
        }

        // وظيفة لتحميل القيمة من sessionStorage
        function loadSelection(selectElement) {
            const savedValue = sessionStorage.getItem(selectElement.id);
            if (savedValue) {
                selectElement.value = savedValue;
            }
        }

        function updatePageData() {
            const selectedYear = yearSelect.value;
            const selectedBreaker = breakerSelect.value;

            if (selectedYear && selectedBreaker) {
                fetch(`/fetch_data.php?breaker=${selectedBreaker}&year=${selectedYear}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            console.error(data.error);
                            // مسح البيانات من الجدول إذا حدث خطأ
                            document.querySelector('.blue_color tr:nth-child(2) td:nth-child(2)').textContent = '';
                            document.querySelector('.blue_color tr:nth-child(2) td:nth-child(4)').textContent = '';
                            document.querySelector('.blue_color tr:nth-child(3) td:nth-child(2)').textContent = '';
                            document.querySelector('.blue_color tr:nth-child(3) td:nth-child(4)').textContent = '';
                            document.querySelector('.blue_color tr:nth-child(4) td:nth-child(2)').textContent = '';
                            document.querySelector('.blue_color tr:nth-child(4) td:nth-child(4)').textContent = '';
                            document.querySelector('.blue_color tr:nth-child(5) td:nth-child(2)').textContent = '';

                            // مسح خلايا الجدول الرابع
                            const inspectionTableBody = document.querySelector('table:nth-of-type(4) tbody');
                            if (inspectionTableBody) {
                                // مسح فقط الصفوف التي يتم تحديثها ديناميكياً
                                const rowsToUpdate = inspectionTableBody.querySelectorAll('tr:not(:nth-last-child(-n+3))');
                                rowsToUpdate.forEach(row => {
                                    row.querySelectorAll('td:nth-child(2)').forEach(cell => cell.textContent = '');
                                    row.querySelectorAll('td:nth-child(3)').forEach(cell => cell.textContent = '');
                                });
                            }
                        } else {
                            // تعبئة الجدول الأول (المعلومات العامة للقاطع)
                            const mainData = data[0];
                            document.querySelector('.blue_color tr:nth-child(2) td:nth-child(2)').textContent = mainData.Location || '';
                            document.querySelector('.blue_color tr:nth-child(2) td:nth-child(4)').textContent = mainData.Sirial_No || '';
                            document.querySelector('.blue_color tr:nth-child(3) td:nth-child(2)').textContent = mainData.manfict_by || '';
                            document.querySelector('.blue_color tr:nth-child(3) td:nth-child(4)').textContent = mainData.Model || '';
                            document.querySelector('.blue_color tr:nth-child(4) td:nth-child(2)').textContent = mainData.Volt || '';
                            document.querySelector('.blue_color tr:nth-child(4) td:nth-child(4)').textContent = mainData.Ampere || '';
                            
                            // تعبئة حقل التفتيش السنوي
                            document.querySelector('.blue_color tr:nth-child(5) td:nth-child(2)').textContent = mainData.Annual_inspect || '';


                            // تحديث الجدول الرابع (نقاط التفتيش)
                            const inspectionTableBody = document.querySelector('table:nth-of-type(4) tbody');
                            if (inspectionTableBody) {
                                // استثناء آخر 3 صفوف من التحديث لأنها ثابتة
                                const rows = inspectionTableBody.querySelectorAll('tr');
                                const rowsToUpdate = Array.from(rows).slice(0, rows.length - 3);

                                data.forEach((breaker, index) => {
                                    if (rowsToUpdate[index]) {
                                        const goodCells = rowsToUpdate[index].querySelectorAll('td')[1];
                                        const maintCells = rowsToUpdate[index].querySelectorAll('td')[2];
                                        if (goodCells && maintCells) {
                                            goodCells.textContent = breaker.state || '';
                                            maintCells.textContent = breaker.need_maint || '';
                                        }
                                    }
                                });

                                // إضافة الملاحظات والتوصيات
                                document.querySelector('table:nth-of-type(4) tr:nth-last-child(5) td:nth-child(2)').textContent = mainData.Note || '';
                                document.querySelector('table:nth-of-type(4) tr:nth-last-child(4) td:nth-child(2)').textContent = mainData.recommends || '';
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            }
        }

        // تحميل القيم المحفوظة عند تحميل الصفحة
        window.addEventListener('load', () => {
            loadSelection(yearSelect);
            loadSelection(breakerSelect);
            updatePageData(); // جلب البيانات عند تحميل الصفحة
        });

        // حفظ القيمة وتحديث البيانات عند تغيير الاختيار
        yearSelect.addEventListener('change', () => {
            saveSelection(yearSelect);
            updatePageData();
        });

        breakerSelect.addEventListener('change', () => {
            saveSelection(breakerSelect);
            updatePageData();
        });
    </script>
    <table>
        <tr>
            <td>August 18, 2025</td>
            <td class='left-align'>Date</td>
            <td colspan='1' class='arabic-text'>سجل التفتيش على قاطع الدائرة الهوائية<br>Air Circuit Breaker Inspection Check list</td>
            <td class='left-align'>Title</td>
            <td class='tdimg' rowspan='5'><img class='imgx' src='imgs/4.png' alt=''></td>
        </tr>
        <tr>
            <td>0</td>
            <td class='left-align'>Rev. No.</td>
            <td colspan='1'>Electrical department</td>
            <td class='left-align'>Department</td>
        </tr>
        <tr>
            <td>1</td>
            <td class='left-align'>Page</td>
            <td colspan='1'>L- EL-ACB – 06</td>
            <td class='left-align'>Document. No:</td>
        </tr>
        <tr>
            <td>YEARLY</td>
            <td>The update</td>
            <td></td>
            <td class='left-align'>Prepared By</td>
        </tr>
        <tr>
            <td>3YEARLY</td>
            <td>The repetition</td>
            <td>Eng/ Khalid Almaqrami</td>
            <td class='left-align'>Approved by</td>
        </tr>
    </table>

    <table>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class='left-align'></td>
        </tr>
    </table>

    <table class='blue_color'>
        <tr>
            <td class='right-align'>الشركة</td>
            <td>YCSR</td>
            <td class='right-align'>التاريخ:</td>
            <td>Date</td>
        </tr>
        <tr>
            <td class='right-align'>الموقع:</td>
            <td></td>
            <td class='right-align'>الرقم التسلسلي: </td>
            <td></td>
        </tr>
        <tr>
            <td class='right-align'>الصانع</td>
            <td></td>
            <td class='right-align'>النوع /الموديل :</td>
            <td></td>
        </tr>
        <tr>
            <td class='right-align'>التصنيف: فولت</td>
            <td></td>
            <td class='right-align'>امبير</td>
            <td></td>
        </tr>
        <tr>
            <td class='right-align'>تفتيش سنوي </td>
            <td colspan='3' class='right-align'></td>
        </tr>
    </table>

    <table>
        <thead>
            <th>نقطة التفتيش</th>
            <th>جيد </th>
            <th> يحتاج صيانة </th>
            <th>نقطة التفتيش</th>
            <th>جيد </th>
            <th> يحتاج صيانة </th>
        </thead>
        <tbody>
            <tr>
                <td>Contact Condition <br>حالة الكونتاكت او نقاط الاتصال</td>
                <td></td>
                <td></td>
                <td>Inspector’s Mechanisms <br>الية الفحص الذاتي</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Good-Surface Smooth <br>حالة سطح الاتصال</td>
                <td></td>
                <td></td>
                <td>Operating Mechanisms Checks <br>الية التشغيل</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Fair-Minor Burns <br>حروق بسيطة </td>
                <td></td>
                <td></td>
                <td>Bushing and wear pin</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Poor-Burned and Pitted<br>حروق سيئة وتنقير في السطح</td>
                <td></td>
                <td></td>
                <td>Set screws and Keepers <br>برغي الضبط</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Contact Check <br>مستوى الاتصال</td>
                <td></td>
                <td></td>
                <td>Positive Devices</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Pressure (Good ,Weak, Bad) <br>مستوى الضغط</td>
                <td></td>
                <td></td>
                <td>Lubricate Wear Points <br>تشحيم </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Draw out Contacts <br>فصل التلامس</td>
                <td></td>
                <td></td>
                <td>Insulation Condition <br>حالة العزل</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Clean pots and Replace Oil <br>تنظيف وعاء الزيت ان وجد</td>
                <td></td>
                <td></td>
                <td>Recommended oil type <br> مواصفة الزيت </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>هل التشحيم كافي ونوعه حسب توصية الشركة الصانعة </td>
                <td></td>
                <td></td>
                <td>Insulation Condition <br>حالة العزل</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Arcing Assemblies <br>Clean and Check the Are- Splitting Plates Surface Conditions <br> افحص ونظف منطقة شرر القوس الكهربائي</td>
                <td></td>
                <td></td>
                <td>Lose Connections <br>وصلات غير مشدودة</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Bushings Clean and check Surface Condition </td>
                <td></td>
                <td></td>
                <td>"Counter Reading (No. of Ops.) <br> فحص العداد ان وجد"</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Phase to Ground (Megohm) <br>المقاومة </td>
                <td></td>
                <td></td>
                <td>"Electrical Load Peak Indicated Amperes <br>اعلى حمل "</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Test Operation <br>فحص تشغيل</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan='6'></td>
            </tr>
            <tr>
                <td class='right-align'>ملاحظات (سجل الإجراءات المتخذة عن طريق التفتيش أو الاختبارات):</td>
                <td class='right-align' colspan='5'></td>
            </tr>
            <tr>
                <td class='right-align'>الـتـوصيــات</td>
                <td class='right-align' colspan='5'></td>
            </tr>
            <tr>
                <td class='right-align'>الفحص بواسطة </td>
                <td class='right-align' colspan='2'></td>
                <td class='right-align'>التوقيع</td>
                <td colspan='2'></td>
            </tr>
            <tr>
                <td class='right-align'>الأعتماد بواسطة </td>
                <td colspan='2'>م/ خالد المقرمي</td>
                <td class='right-align'>التوقيع</td>
                <td colspan='2'></td>
            </tr>
            <tr>
                <td colspan='6'>NFPA 70B</td>
            </tr>
        </tbody>
    </table>

</body>

</html>