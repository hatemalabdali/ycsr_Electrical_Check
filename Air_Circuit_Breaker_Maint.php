<?php
header('Content-Type: text/html; charset=utf-8');
// يجب أن يكون هذا السطر في أعلى الملف قبل أي محتوى HTML
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Circuit Breaker Maint Checklist</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 1.5%;
            width: 97%;
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

        .SR_col {
            width: 5%;
        }

        @media screen and (max-width: 480px) {
            body {
                font-family: Arial, sans-serif;
                padding-left: 1.5%;
                 padding-right: 1.5%;
                  padding-top: 1.5%;
                   padding-bottom: 0;
                   margin-bottom: 0;
                width: 300%;
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

            .SR_col {
                width: 5%;
            }
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
        <button id="save-data-btn" class="back-btn" style="margin-right: 2%;">حفظ البيانات</button>
    </div>
    <script>
        let isDirty = false;

        async function saveInspectionData() {
            try {
                const states = [];
                const needMaintValues = [];
                const srs = [];

                // const dateCell = document.querySelector("table:nth-of-type(1) tr:nth-child(1) td:nth-child(1)");

                // جلب قيمة القاطع والسنة من القوائم المنسدلة
                const DateValue = document.querySelector('table:nth-of-type(1) tr:nth-last-child(5) td:nth-child(1)').textContent.trim();


                const selectedBreaker = document.getElementById('breaker-select').value;
                const selectedYear = document.getElementById('year-select').value;
                // جلب اسم المستخدم من متغير الجلسة في PHP
                const loggedInUser = "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>";
                const noteValue = document.querySelector('table:nth-of-type(4) tr:nth-last-child(5) td:nth-child(2)').textContent.trim();

                const recommendsValue = document.querySelector('table:nth-of-type(4) tr:nth-last-child(4) td:nth-child(2)').textContent.trim();

                const inspectionTableBody = document.querySelector('table:nth-of-type(4) tbody');
                const rowsToSave = inspectionTableBody.querySelectorAll('tr[data-sr]');

                // أولاً، جمع بيانات الأعمدة من المجموعة الأولى (الأعمدة 3 و 4)
                rowsToSave.forEach(row => {
                    const sr = row.getAttribute('data-sr');
                    srs.push(sr);

                    const state1 = row.querySelector('td:nth-child(3)').textContent.trim();
                    states.push(state1);

                    const needMaint1 = row.querySelector('td:nth-child(4)').textContent.trim();
                    needMaintValues.push(needMaint1);
                });

                // ثم، جمع بيانات الأعمدة من المجموعة الثانية (الأعمدة 6 و 7)
                rowsToSave.forEach(row => {
                    const state2 = row.querySelector('td:nth-child(6)').textContent.trim();
                    states.push(state2);

                    const needMaint2 = row.querySelector('td:nth-child(7)').textContent.trim();
                    needMaintValues.push(needMaint2);
                });

                console.log("States Array to be sent:", states);
                console.log("Maint Array to be sent:", needMaintValues);
                console.log("Note to be sent:", noteValue);
                console.log("Recommends to be sent:", recommendsValue);
                console.log("Selected Breaker:", selectedBreaker);
                console.log("Selected Year:", selectedYear);
                console.log("Logged-in User:", loggedInUser);
                console.log("Date:", DateValue);


                const postData = {
                    states: states,
                    srs: srs,
                    // إضافة مصفوفة الصيانة إلى كائن البيانات
                    need_maint: needMaintValues,
                    note: noteValue,
                    recommends: recommendsValue,
                    // إضافة اسم القاطع والسنة
                    breaker: selectedBreaker,
                    year: selectedYear,
                    // إضافة اسم المستخدم المسجل دخوله
                    prepared_by: loggedInUser,
                    date_value: DateValue
                };

                const response = await fetch('save_data.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(postData)
                });

                const result = await response.json();

                if (result.success) {
                    isDirty = false;
                    alert('تم حفظ البيانات بنجاح!');
                } else {
                    alert('حدث خطأ أثناء الحفظ: ' + result.error);
                }

            } catch (error) {
                console.error('Error:', error);
                alert('حدث خطأ غير متوقع أثناء حفظ البيانات.');
            }
        }
        // ربط الدالة بزر الحفظ
        document.getElementById('save-data-btn').addEventListener('click', async () => {
            // عرض نافذة التأكيد للمستخدم
            if (confirm("هل أنت متأكد من حفظ البيانات؟")) {
                // إذا ضغط المستخدم على "موافق"، يتم استدعاء الدالة الأصلية
                saveInspectionData();
            } else {
                // إذا ضغط المستخدم على "إلغاء"، يمكن عرض رسالة اختيارية
                console.log("تم إلغاء عملية الحفظ.");
                // يمكنك إضافة كود آخر هنا إذا أردت
            }
        });
        ////////////////////////////////////////*************************************///////////////////////////////////

        ////////////////////////////////////////*************************************///////////////////////////////////
        // Set the date automatically when the page loads
        document.addEventListener("DOMContentLoaded", function() {
            const dateCell = document.querySelector("table:nth-of-type(1) tr:nth-child(1) td:nth-child(1)");
            if (dateCell) {
                const today = new Date();
                const day = String(today.getDate()).padStart(2, '0');
                const month = String(today.getMonth() + 1).padStart(2, '0');
                const year = today.getFullYear();
                dateCell.textContent = `${day}/${month}/${year}`;
            }

            // Get the logged-in user's name from the PHP session variable
            const loggedInUser = "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>";

            const inputFields = document.querySelectorAll('input, select, textarea');

            inputFields.forEach(field => {
                field.addEventListener('change', () => {
                    isDirty = true;
                });
                // يمكنك استخدام 'input' بدلاً من 'change' إذا كنت تريد تتبع التغييرات الفورية
                // field.addEventListener('input', () => {
                //     isDirty = true;
                // });
            });

            // Set the logged-in user's name in the "Prepared By" cell
            // document.querySelector('table:nth-of-type(1) tr:nth-child(4) td:nth-child(3)').textContent = loggedInUser;
            // // Set the logged-in user's name in the "الفحص بواسطة" cell
            // document.querySelector('table:nth-of-type(4) tr:nth-last-child(3) td:nth-child(2)').textContent = loggedInUser;

            // --- وظائف عامة للتعامل مع النقر على الخلايا ---

            // وظيفة لإظهار مربع الحوار للمقاومة
            function handleResistanceInput(cell) {
                const r1 = prompt("أدخل قيمة المقاومة R L1-L2:");
                const r2 = prompt("أدخل قيمة المقاومة R L1-L3:");
                const r3 = prompt("أدخل قيمة المقاومة R L2-L3:");

                if (r1 !== null && r2 !== null && r3 !== null) {
                    cell.innerHTML = `RL1L2 = ${r1} MΩ <br> RL1L3 = ${r2} MΩ <br> RL2L3 = ${r3} MΩ`;
                    isDirty = true;
                    const adjacentMaintCell = cell.nextElementSibling;
                    if (adjacentMaintCell) {
                        adjacentMaintCell.textContent = '';
                    }
                }
            }

            function handleElectricalLoadInput(cell) {
                const load = prompt("أدخل قيمة تيار أعلى حمل:");

                if (load !== null && load.trim() !== "") {
                    cell.textContent = `${load}A`;
                    isDirty = true;
                    const adjacentMaintCell = cell.nextElementSibling;
                    if (adjacentMaintCell) {
                        adjacentMaintCell.textContent = '';
                    }
                }
            }

            function handleNotecalLoadInput(cell) {
                const load = prompt(" أدخل ملاحظاتك:");

                if (load !== null && load.trim() !== "") {
                    cell.textContent = `${load}`;
                    isDirty = true;
                    const adjacentMaintCell = cell.nextElementSibling;
                    if (adjacentMaintCell) {
                        adjacentMaintCell.textContent = '';
                    }
                }
            }

            function handle_Recommends_calLoadInput(cell) {
                const load = prompt(" أدخل توصياتك:");

                if (load !== null && load.trim() !== "") {
                    cell.textContent = `${load}`;
                    isDirty = true;
                    const adjacentMaintCell = cell.nextElementSibling;
                    if (adjacentMaintCell) {
                        adjacentMaintCell.textContent = '';
                    }
                }
            }

            // إضافة الكود للتعامل مع النقر على خلايا الصيانة
            const maintenanceCells = document.querySelectorAll('.maintenance-cell');
            maintenanceCells.forEach((cell) => {
                cell.addEventListener('click', () => {
                    const adjacentGoodCell = cell.previousElementSibling;
                    const currentValue = cell.textContent.trim();
                    const row = cell.closest('tr');
                    const rowIndex = Array.from(row.parentNode.children).indexOf(row);
                    const colindex = Array.from(cell.parentNode.children).indexOf(cell);
                    if (rowIndex === 8) {
                        if (currentValue === '') {
                            cell.textContent = 'يحتاج إضافة';
                            isDirty = true;
                            if (adjacentGoodCell) adjacentGoodCell.textContent = '';
                        } else if (currentValue === 'يحتاج إضافة') {
                            cell.textContent = 'يحتاج تغيير';
                            isDirty = true;
                            if (adjacentGoodCell) adjacentGoodCell.textContent = '';
                        } else {
                            cell.textContent = '';
                            isDirty = true;
                        }
                    } else if (rowIndex === 10) {
                        if (colindex === 3) {
                            if (currentValue === '') {
                                cell.textContent = 'يحتاج صيانة';
                                isDirty = true;
                            } else {
                                cell.textContent = '';
                                isDirty = true;
                            }
                        } else {
                            if (currentValue === '') {
                                cell.textContent = 'يحتاج صيانة';
                                isDirty = true;
                                if (adjacentGoodCell) adjacentGoodCell.textContent = '';
                            } else {
                                cell.textContent = '';
                                isDirty = true;
                            }
                        }
                    } else if (rowIndex === 11) {
                        if (colindex === 3) {
                            if (currentValue === '') {
                                cell.textContent = 'يحتاج صيانة';
                                isDirty = true;
                            } else {
                                cell.textContent = '';
                                isDirty = true;
                            }
                        } else {
                            if (currentValue === '') {
                                cell.textContent = 'يحتاج صيانة';
                                isDirty = true;
                                if (adjacentGoodCell) adjacentGoodCell.textContent = '';
                            } else {
                                cell.textContent = '';
                                isDirty = true;
                            }
                        }
                    } else if (rowIndex === 12) {
                        if (colindex === 6) {
                            if (currentValue === '') {
                                cell.textContent = 'يحتاج صيانة';
                                isDirty = true;
                            } else {
                                cell.textContent = '';
                                isDirty = true;
                            }
                        } else {
                            if (currentValue === '') {
                                cell.textContent = 'يحتاج صيانة';
                                isDirty = true;
                                if (adjacentGoodCell) adjacentGoodCell.textContent = '';
                            } else {
                                cell.textContent = '';
                                isDirty = true;
                            }
                        }
                    } else {
                        if (currentValue === '') {
                            cell.textContent = 'يحتاج صيانة';
                            isDirty = true;
                            if (adjacentGoodCell) adjacentGoodCell.textContent = '';
                        } else {
                            cell.textContent = '';
                            isDirty = true;
                        }
                    }
                });
            });

            // إضافة الكود للتعامل مع النقر على خلايا "جيد"
            const goodCells = document.querySelectorAll('.good-cell');
            goodCells.forEach((cell, index) => {
                cell.addEventListener('click', () => {
                    const adjacentMaintCell = cell.nextElementSibling;
                    const currentValue = cell.textContent.trim();
                    const row = cell.closest('tr');
                    const rowIndex = Array.from(row.parentNode.children).indexOf(row);
                    const colindex = Array.from(cell.parentNode.children).indexOf(cell);
                    // استخدام rowIndex لتسهيل قراءة الكود
                    if (rowIndex === 6) { // الصف الخاص بـ "Lubrication_check"
                        if (colindex === 5) {
                            if (currentValue === '') {
                                cell.textContent = 'تم';
                                isDirty = true;
                            } else if (currentValue === 'تم') {
                                cell.textContent = 'لا يوجد';
                                isDirty = true;
                            } else {
                                cell.textContent = '';
                                isDirty = true;
                            }
                            if (adjacentMaintCell) adjacentMaintCell.textContent = '';
                        } else { // الصف الخاص بـ "Lubrication_check"
                            if (currentValue === '') {
                                cell.textContent = 'جيد';
                                isDirty = true;
                            } else if (currentValue === 'جيد') {
                                cell.textContent = 'لا يوجد';
                                isDirty = true;
                            } else {
                                cell.textContent = '';
                                isDirty = true;
                            }
                            if (adjacentMaintCell) adjacentMaintCell.textContent = '';
                        }
                    } else if (rowIndex === 7) { // الصف الخاص بـ "Lubrication_check"
                        if (colindex === 5) {
                            if (currentValue === '') {
                                cell.textContent = 'تم';
                                isDirty = true;
                            } else if (currentValue === 'تم') {
                                cell.textContent = 'لا يوجد';
                                isDirty = true;
                            } else {
                                cell.textContent = '';
                                isDirty = true;
                            }
                            if (adjacentMaintCell) adjacentMaintCell.textContent = '';
                        } else { // الصف الخاص بـ "Lubrication_check"
                            if (currentValue === '') {
                                cell.textContent = 'جيد';
                                isDirty = true;
                            } else if (currentValue === 'جيد') {
                                cell.textContent = 'لا يوجد';
                                isDirty = true;
                            } else {
                                cell.textContent = '';
                                isDirty = true;
                            }
                            if (adjacentMaintCell) adjacentMaintCell.textContent = '';
                        }
                    } else if (rowIndex === 8) { // الصف الخاص بـ "Lubrication_check"
                        if (colindex === 2) {
                            if (currentValue === '') {
                                cell.textContent = 'نعم';
                                isDirty = true;
                            } else if (currentValue === 'تم') {
                                cell.textContent = 'لا يوجد';
                                isDirty = true;
                            } else {
                                cell.textContent = '';
                                isDirty = true;
                            }
                            if (adjacentMaintCell) adjacentMaintCell.textContent = '';
                        } else { // الصف الخاص بـ "Lubrication_check"
                            if (currentValue === '') {
                                cell.textContent = 'جيد';
                                isDirty = true;
                            } else if (currentValue === 'جيد') {
                                cell.textContent = 'لا يوجد';
                                isDirty = true;
                            } else {
                                cell.textContent = '';
                                isDirty = true;
                            }
                            if (adjacentMaintCell) adjacentMaintCell.textContent = '';
                        }
                    } else if (rowIndex === 9) { // الصف الخاص بـ "Lubrication_check"
                        if (colindex === 2) {
                            if (currentValue === '') {
                                cell.textContent = 'تم';
                                isDirty = true;
                            } else if (currentValue === 'تم') {
                                cell.textContent = 'لا يوجد';
                                isDirty = true;
                            } else {
                                cell.textContent = '';
                                isDirty = true;
                            }
                            if (adjacentMaintCell) adjacentMaintCell.textContent = '';
                        } else { // الصف الخاص بـ "Lubrication_check"
                            if (currentValue === '') {
                                cell.textContent = 'جيد';
                                isDirty = true;
                            } else if (currentValue === 'جيد') {
                                cell.textContent = 'لا يوجد';
                                isDirty = true;
                            } else {
                                cell.textContent = '';
                                isDirty = true;
                            }
                            if (adjacentMaintCell) adjacentMaintCell.textContent = '';
                        }
                    } else if (rowIndex === 10) { // الصف الخاص بـ "Lubrication_check"
                        if (colindex === 2) {
                            if (currentValue === '') {
                                cell.textContent = 'تم';
                                isDirty = true;
                            } else if (currentValue === 'تم') {
                                cell.textContent = 'لا يوجد';
                                isDirty = true;
                            } else {
                                cell.textContent = '';
                                isDirty = true;
                            }

                        } else { // الصف الخاص بـ "Lubrication_check"
                            if (currentValue === '') {
                                cell.textContent = 'جيد';
                                isDirty = true;
                            } else if (currentValue === 'جيد') {
                                cell.textContent = 'لا يوجد';
                                isDirty = true;
                            } else {
                                cell.textContent = '';
                                isDirty = true;
                            }
                            if (adjacentMaintCell) adjacentMaintCell.textContent = '';
                        }
                    } else if (rowIndex === 11) { // الصف الخاص بـ "Phase to Ground"
                        if (colindex === 2) {
                            handleResistanceInput(cell);
                        } // استدعاء الدالة هنا مباشرةً
                        else {
                            if (currentValue === '') {
                                cell.textContent = 'جيد';
                                isDirty = true;
                            } else if (currentValue === 'جيد') {
                                cell.textContent = 'لا يوجد';
                                isDirty = true;
                            } else {
                                cell.textContent = '';
                                isDirty = true;
                            }

                        }
                    } else if (rowIndex === 12) { // الصف الخاص بـ "Counter Reading"
                        if (colindex === 5) {
                            handleElectricalLoadInput(cell);
                        } else { // باقي الخلايا
                            if (currentValue === '') {
                                cell.textContent = 'جيد';
                                isDirty = true;
                            } else if (currentValue === 'جيد') {
                                cell.textContent = 'لا يوجد';
                                isDirty = true;
                            } else {
                                cell.textContent = '';
                                isDirty = true;
                            }
                            if (adjacentMaintCell) adjacentMaintCell.textContent = '';
                        }
                    } else if (rowIndex === 14) { // الصف الخاص بـ "Counter Reading"
                        // if (colindex === 3) {
                        handleNotecalLoadInput(cell);
                        // } 

                    } else if (rowIndex === 15) { // الصف الخاص بـ "Counter Reading"
                        // if (colindex === 3) {
                        handle_Recommends_calLoadInput(cell);
                        // } 

                    } else { // باقي الخلايا
                        if (currentValue === '') {
                            cell.textContent = 'جيد';
                            isDirty = true;
                        } else if (currentValue === 'جيد') {
                            cell.textContent = 'لا يوجد';
                            isDirty = true;
                        } else {
                            cell.textContent = '';
                            isDirty = true;
                        }
                        if (adjacentMaintCell) adjacentMaintCell.textContent = '';
                    }
                });
            });

            // --- كود التعامل مع القوائم المنسدلة وجلب البيانات ---

            const yearSelect = document.getElementById('year-select');
            const breakerSelect = document.getElementById('breaker-select');

            function saveSelection(selectElement) {
                sessionStorage.setItem(selectElement.id, selectElement.value);
            }

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
                                document.querySelector('.blue_color tr:nth-child(1) td:nth-child(4)').textContent = '';
                                document.querySelector('.blue_color tr:nth-child(2) td:nth-child(2)').textContent = '';
                                document.querySelector('.blue_color tr:nth-child(2) td:nth-child(4)').textContent = '';
                                document.querySelector('.blue_color tr:nth-child(3) td:nth-child(2)').textContent = '';
                                document.querySelector('.blue_color tr:nth-child(3) td:nth-child(4)').textContent = '';
                                document.querySelector('.blue_color tr:nth-child(4) td:nth-child(2)').textContent = '';
                                document.querySelector('.blue_color tr:nth-child(4) td:nth-child(4)').textContent = '';
                                document.querySelector('.blue_color tr:nth-child(5) td:nth-child(2)').textContent = '';

                                const inspectionTableBody = document.querySelector('table:nth-of-type(4) tbody');
                                if (inspectionTableBody) {
                                    const rowsToUpdate = inspectionTableBody.querySelectorAll('tr:not(:nth-last-child(-n+3))');
                                    rowsToUpdate.forEach(row => {
                                        row.querySelectorAll('td:nth-child(2)').forEach(cell => cell.textContent = '');
                                        row.querySelectorAll('td:nth-child(3)').forEach(cell => cell.textContent = '');
                                    });
                                }
                            } else {
                                const mainData = data[0];
                                document.querySelector('.blue_color tr:nth-child(1) td:nth-child(4)').textContent = mainData.Date || '';
                                document.querySelector('.blue_color tr:nth-child(2) td:nth-child(2)').textContent = mainData.Location || '';
                                document.querySelector('.blue_color tr:nth-child(2) td:nth-child(4)').textContent = mainData.Sirial_No || '';
                                document.querySelector('.blue_color tr:nth-child(3) td:nth-child(2)').textContent = mainData.manfict_by || '';
                                document.querySelector('.blue_color tr:nth-child(3) td:nth-child(4)').textContent = mainData.Model || '';
                                document.querySelector('.blue_color tr:nth-child(4) td:nth-child(2)').textContent = mainData.Volt || '';
                                document.querySelector('.blue_color tr:nth-child(4) td:nth-child(4)').textContent = mainData.Ampere || '';
                                document.querySelector('.blue_color tr:nth-child(5) td:nth-child(2)').textContent = mainData.Annual_inspect || '';

                                document.querySelector('table:nth-of-type(1) tr:nth-child(4) td:nth-child(3)').textContent = mainData.prepared_by || '';
                                // تعبئة حقل "الفحص بواسطة" باسم الفاحص
                                document.querySelector('table:nth-of-type(4) tr:nth-last-child(3) td:nth-child(2)').textContent = mainData.prepared_by || '';

                                const inspectionTableBody = document.querySelector('table:nth-of-type(4) tbody');
                                if (inspectionTableBody) {
                                    const rows = inspectionTableBody.querySelectorAll('tr[data-sr]');
                                    const rowsToUpdate = Array.from(rows).slice(0, rows.length + 13);

                                    rowsToUpdate.forEach((row, index) => {
                                        row.querySelector('td:nth-child(3)').textContent = data[index * 1].state || '';
                                        row.querySelector('td:nth-child(4)').textContent = data[index * 1].need_maint || '';

                                        row.querySelector('td:nth-child(6)').textContent = data[index * 1 + 13].state || '';
                                        row.querySelector('td:nth-child(7)').textContent = data[index * 1 + 13].need_maint || '';

                                    });

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

            window.addEventListener('load', () => {
                loadSelection(yearSelect);
                loadSelection(breakerSelect);
                updatePageData();
            });

            yearSelect.addEventListener('change', () => {
                saveSelection(yearSelect);
                updatePageData();
            });

            breakerSelect.addEventListener('change', () => {
                saveSelection(breakerSelect);
                updatePageData();
            });
        });

        // ... (جميع الدوال والمتغيرات الأخرى، مثل isDirty و saveInspectionData) ...

        // هذا الكود يستمع لحدث مغادرة الصفحة، لذا يجب أن يكون في نطاق عام
        window.addEventListener('beforeunload', (event) => {
            if (isDirty) {
                event.preventDefault();
                event.returnValue = '';
            }
        });
    </script>
    <table>
        <tr>
            <td></td>
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
            <td style="background-color: bisque;" colspan='7'></td>
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
            <td class='right-align'>تفتيش </td>
            <td colspan='3' class='right-align'></td>
        </tr>
    </table>

    <table id="inspection-table">
        <thead>
            <th>SR</th>
            <th>نقطة التفتيش</th>
            <th>جيد </th>
            <th> يحتاج صيانة </th>
            <th>نقطة التفتيش</th>
            <th>جيد </th>
            <th> يحتاج صيانة </th>
        </thead>
        <tbody>
            <tr data-sr="1">
                <td>1</td>
                <td>Contact Condition <br>حالة الكونتاكت او نقاط الاتصال</td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
                <td>Inspector’s Mechanisms <br>الية الفحص الذاتي</td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
            </tr>
            <tr data-sr="2">
                <td>2</td>
                <td>Good-Surface Smooth <br>حالة سطح الاتصال</td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
                <td>Operating Mechanisms Checks <br>الية التشغيل</td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
            </tr>
            <tr data-sr="3">
                <td class="SR_col">3</td>
                <td>Fair-Minor Burns <br>حروق بسيطة </td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
                <td>Positive Close and Trip<br>الاغلاق والفصل</td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
            </tr>
            <tr data-sr="4">
                <td>4</td>
                <td>Poor-Burned and Pitted<br>حروق سيئة وتنقير في السطح</td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
                <td>Bushing and wear pin</td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
            </tr>
            <tr data-sr="5">
                <td>5</td>
                <td>Contact Check <br>مستوى الاتصال</td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
                <td>Set screws and Keepers <br>برغي الضبط</td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
            </tr>
            <tr data-sr="6">
                <td>6</td>
                <td>Pressure (Good ,Weak, Bad) <br>مستوى الضغط</td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
                <td>Positive Devices</td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
            </tr>
            <tr data-sr="7">
                <td>7</td>
                <td>Draw out Contacts <br>فصل التلامس</td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
                <td>Lubricate Wear Points <br>تشحيم </td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
            </tr>
            <tr data-sr="8">
                <td>8</td>
                <td>Alignment<br>المحاذاة</td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
                <td>Clean pots and Replace Oil <br>تنظيف وعاء الزيت ان وجد</td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
            </tr>
            <tr data-sr="9">
                <td>9</td>
                <td>هل التشحيم كافي ونوعه حسب توصية الشركة الصانعة </td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
                <td>Recommended oil type <br> مواصفة الزيت </td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
            </tr>
            <tr data-sr="10">
                <td>10</td>
                <td>Arcing Assemblies <br>Clean and Check the Are- Splitting Plates Surface Conditions <br> افحص ونظف منطقة شرر القوس الكهربائي</td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
                <td>Insulation Condition <br>حالة العزل</td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
            </tr>
            <tr data-sr="11">
                <td>11</td>
                <td>Bushings Clean and check Surface Condition </td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
                <td>Lose Connections <br>وصلات غير مشدودة</td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
            </tr>
            <tr data-sr="12">
                <td>12</td>
                <td>Phase to Ground (Megohm) <br>المقاومة </td>
                <td id="resistance-cell" class="good-cell"></td>
                <td class="maintenance-cell"></td>
                <td>"Counter Reading (No. of Ops.) <br> فحص العداد ان وجد"</td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
            </tr>
            <tr data-sr="13">
                <td>13</td>
                <td>Test Operation <br>فحص تشغيل</td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
                <td>"Electrical Load Peak Indicated Amperes <br>اعلى حمل "</td>
                <td class="good-cell"></td>
                <td class="maintenance-cell"></td>
            </tr>
            <tr>
                <td style="background-color: bisque;" colspan='7'></td>
            </tr>
            <tr>
                <td class='right-align' colspan='2'>ملاحظات (سجل الإجراءات المتخذة عن طريق التفتيش أو الاختبارات):</td>
                <td class='good-cell' colspan='5'></td>
            </tr>
            <tr>
                <td class='right-align'>الـتـوصيــات</td>
                <td class='good-cell' colspan='6'></td>
            </tr>
            <tr>
                <td class='right-align' colspan='2'>الفحص بواسطة </td>
                <td class='right-align' colspan='2'></td>
                <td class='right-align'>التوقيع</td>
                <td colspan='2'></td>
            </tr>
            <tr>
                <td class='right-align' colspan='2'>الأعتماد بواسطة </td>
                <td colspan='2'>م/ خالد المقرمي</td>
                <td class='right-align'>التوقيع</td>
                <td colspan='2'></td>
            </tr>
            <tr>
                <td colspan='7'>NFPA 70B</td>
            </tr>
        </tbody>
    </table>

</body>

</html>