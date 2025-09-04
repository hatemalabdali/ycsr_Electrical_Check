<?php
// يجب أن يكون هذا السطر في أعلى الملف قبل أي محتوى HTML
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>القرائات اليوميات والتقارير</title>
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

        th {
            background-color: #8cacdeff;
        }

        .left-align {
            text-align: left;
            direction: ltr;
        }

        .right-align {
            text-align: right;
        }

        .arabic-text {
            direction: rtl;
        }

        .En-text {
            direction: ltr;
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

        .date-selectors {
            position: relative;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border: 1px solid #e0e0e0;
            width: 10%;
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

        .bisque {
            background-color: bisque;
        }

        .greenyellow {
            background-color: greenyellow;
        }

        .center {
            text-align: center;
        }

        .wide_font {
            font-family: Arial, sans-serif;
            font-weight: 600;
        }

        .print-button {
            cursor: pointer;
        }

        .eng {
            padding-left: 5%;
            padding-right: 5%;

            text-align: center;
            width: 90%;
            display: flex;
            justify-content: space-between;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-weight: 600;

        }

        .tail {
            text-align: center;
            width: 100%;

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
                margin-bottom: 0;
                padding-bottom: 0;
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

            .En-text {
                direction: ltr;
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

            .date-selectors {
                position: relative;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                padding: 10px;
                border: 1px solid #e0e0e0;
                width: 10%;
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

            .bisque {
                background-color: bisque;
            }

            .greenyellow {
                background-color: greenyellow;
            }

        }

        @media print {
            body {
                width: 100%;
                padding: 0;
                margin-left: 0;
                margin-right: 0;
                margin-bottom: 0;
                margin-top: 5%;
                background: #fff !important;
            }

            .top_div {
                display: none !important;
            }

        }
    </style>
</head>

<body>
    <div class="top_div">

        <a href="logbook.php" class="back-btn">العودة للصفحة السابقة</a>

        <div class="select-container">
            <label for="year-select" class="select-label">اختر السنة:</label>
            <select id="year-select" name="year-select" class="custom-select">
                <!-- <option value="" disabled selected>-- اختر سنة --</option> -->
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>
            </select>
        </div>
        <div class="select-container">
            <label for="year-select" class="select-label">اختر الشهر:</label>
            <select id="month-select" name="year-select" class="custom-select">
                <!-- <option value="" disabled selected>-- اختر سنة --</option> -->
                <!-- <option value="">اختر الشهر</option> -->
                <option value="1">يناير</option>
                <option value="2">فبراير</option>
                <option value="3">مارس</option>
                <option value="4">أبريل</option>
                <option value="5">مايو</option>
                <option value="6">يونيو</option>
                <option value="7">يوليو</option>
                <option value="8">أغسطس</option>
                <option value="9">سبتمبر</option>
                <option value="10">أكتوبر</option>
                <option value="11">نوفمبر</option>
                <option value="12">ديسمبر</option>
            </select>
        </div>
        <div class="select-container">
            <label for="year-select" class="select-label">اختر الشهر:</label>
            <select id="day-select" name="year-select" class="custom-select">
                <!-- <option value="" disabled selected>-- اختر سنة --</option> -->
                <!-- <option value="">اختر الشهر</option> -->
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
        </div>


        <!-- <button id="save-data-btn" class="back-btn" style="margin-right: 2%;">حفظ البيانات</button> -->
        <button class="print-button" onclick="window.print()"><img class="pdf_img" src="imgs/printdoc2.png"
                alt=""></button>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {




            // يمكنك وضع هذا الكود هنا لضمان تنفيذه بعد تحميل الصفحة
            // استهداف خلية الاولى فقط 
            // document.querySelector('table:nth-of-type(2) tr:nth-child(1) td:nth-child(6)').classList.add('center');
            // استهداف الصف الاول فقط 
            // document.querySelectorAll('table:nth-of-type(2) tr:nth-child(1) td').forEach(cell => {
            //     cell.classList.add('center');
            // });
            // استهداف الجدول بالكامل 
            document.querySelectorAll('table:nth-of-type(1) tr td').forEach(cell => {
                cell.classList.add('wide_font');
                cell.classList.add('center');
            });

            document.querySelectorAll('table:nth-of-type(2) tr td').forEach(cell => {
                cell.classList.add('center');
            });
            // استهداف الصف الاول فقط 
            document.querySelectorAll('table:nth-of-type(2) tr:nth-child(1) td').forEach(cell => {
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(2) tr:nth-child(2) td').forEach(cell => {
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(2) tr:nth-child(3) td').forEach(cell => {
                cell.classList.add('blue_color');
                cell.classList.add('wide_font');
            });


            document.querySelectorAll('table:nth-of-type(3) tr td').forEach(cell => {
                cell.classList.add('center');
            });
            document.querySelectorAll('table:nth-of-type(3) tr:nth-child(1) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            // استهداف الصف الاول فقط 
            document.querySelectorAll('table:nth-of-type(3) tr:nth-child(2) td').forEach(cell => {
                cell.classList.add('blue_color');
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(3) tr:nth-child(3) td').forEach(cell => {
                cell.classList.add('wide_font');
            });


            document.querySelectorAll('table:nth-of-type(4) tr td').forEach(cell => {
                cell.classList.add('center');
            });
            document.querySelectorAll('table:nth-of-type(4) tr:nth-child(1) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            // استهداف الصف الاول فقط 
            document.querySelectorAll('table:nth-of-type(4) tr:nth-child(2) td').forEach(cell => {
                cell.classList.add('blue_color');
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(4) tr:nth-child(3) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            document.querySelectorAll('table:nth-of-type(5) tr td').forEach(cell => {
                cell.classList.add('center');
            });
            document.querySelectorAll('table:nth-of-type(5) tr:nth-child(1) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            // استهداف الصف الاول فقط 
            document.querySelectorAll('table:nth-of-type(5) tr:nth-child(2) td').forEach(cell => {
                cell.classList.add('blue_color');
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(5) tr:nth-child(3) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            document.querySelectorAll('table:nth-of-type(6) tr td').forEach(cell => {
                cell.classList.add('center');
            });
            document.querySelectorAll('table:nth-of-type(6) tr:nth-child(1) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            // استهداف الصف الاول فقط 
            document.querySelectorAll('table:nth-of-type(6) tr:nth-child(2) td').forEach(cell => {
                cell.classList.add('blue_color');
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(6) tr:nth-child(3) td').forEach(cell => {
                cell.classList.add('wide_font');
            });


            document.querySelectorAll('table:nth-of-type(7) tr td').forEach(cell => {
                cell.classList.add('center');
            });
            document.querySelectorAll('table:nth-of-type(7) tr:nth-child(1) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            // استهداف الصف الاول فقط 
            document.querySelectorAll('table:nth-of-type(7) tr:nth-child(2) td').forEach(cell => {
                cell.classList.add('blue_color');
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(7) tr:nth-child(3) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            document.querySelectorAll('table:nth-of-type(8) tr td').forEach(cell => {
                cell.classList.add('center');
            });
            document.querySelectorAll('table:nth-of-type(8) tr:nth-child(1) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            // استهداف الصف الاول فقط 
            document.querySelectorAll('table:nth-of-type(8) tr:nth-child(2) td').forEach(cell => {
                cell.classList.add('blue_color');
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(8) tr:nth-child(3) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            document.querySelectorAll('table:nth-of-type(9) tr td').forEach(cell => {
                cell.classList.add('center');
            });
            document.querySelectorAll('table:nth-of-type(9) tr:nth-child(1) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            // استهداف الصف الاول فقط 
            document.querySelectorAll('table:nth-of-type(9) tr:nth-child(2) td').forEach(cell => {
                cell.classList.add('blue_color');
                cell.classList.add('wide_font');
            });

            // start


            const dateCell = document.querySelector("table:nth-of-type(1) tr:nth-child(1) td:nth-child(1)");
            if (dateCell) {
                const today = new Date();
                const day = String(today.getDate()).padStart(2, '0');
                const month = String(today.getMonth() + 1).padStart(2, '0');
                const year = today.getFullYear();
                dateCell.textContent = `${day}/${month}/${year}`;
            }



            const yearSelect = document.getElementById('year-select');
            const monthSelect = document.getElementById('month-select');
            const daySelect = document.getElementById('day-select');

            function saveSelection(selectElement) {
                sessionStorage.setItem(selectElement.id, selectElement.value);
            }

            function loadSelection(selectElement) {
                const savedValue = sessionStorage.getItem(selectElement.id);
                if (savedValue) {
                    selectElement.value = savedValue;
                }
            }

            // تحميل القيم المحفوظة
            loadSelection(yearSelect);
            loadSelection(monthSelect);
            loadSelection(daySelect);

            // إضافة event listeners للحفظ
            yearSelect.addEventListener('change', function() {
                saveSelection(this);
            });

            monthSelect.addEventListener('change', function() {
                saveSelection(this);
            });

            daySelect.addEventListener('change', function() {
                saveSelection(this);
            });






            function updatePageData() {
                const selectedYear = yearSelect.value;
                const selectedmonth = monthSelect.value;
                const selectday = daySelect.value;
                clearAllCells();

                if (selectedYear && selectedmonth) {
                    fetch(`/fetch_Logbook_data.php?breaker=${selectedmonth}&year=${selectedYear}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                console.error(data.error);
                                // table2
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(1)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(20)').textContent = '';

                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(1)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(20)').textContent = '';

                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(1)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(20)').textContent = '';

                                // table 3
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(36)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(35)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(34)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(33)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(32)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(31)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(30)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(29)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(28)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(27)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(26)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(25)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(24)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(23)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(22)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(21)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(20)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(36)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(35)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(34)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(33)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(32)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(31)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(30)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(29)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(28)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(27)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(26)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(25)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(24)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(23)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(22)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(21)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(20)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(36)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(35)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(34)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(33)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(32)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(31)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(30)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(29)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(28)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(27)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(26)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(25)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(24)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(23)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(22)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(21)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(20)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(1)').textContent = '';
                                // TABLE 4 
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(32)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(31)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(30)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(29)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(28)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(27)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(26)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(25)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(24)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(23)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(22)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(21)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(20)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(32)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(31)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(30)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(29)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(28)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(27)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(26)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(25)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(24)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(23)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(22)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(21)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(20)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(32)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(31)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(30)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(29)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(28)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(27)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(26)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(25)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(24)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(23)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(22)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(21)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(20)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(1)').textContent = '';
                                // TABLE 5
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(32)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(31)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(30)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(29)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(28)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(26)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(27)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(25)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(24)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(23)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(22)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(21)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(20)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(16)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(13)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(7)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(4)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(3)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(32)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(31)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(30)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(29)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(28)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(26)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(27)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(25)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(24)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(23)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(22)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(21)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(20)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(16)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(13)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(7)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(4)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(3)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(32)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(31)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(30)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(29)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(28)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(26)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(27)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(25)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(24)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(23)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(22)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(21)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(20)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(16)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(13)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(7)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(4)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(3)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(1)').textContent = '';
                                // table 6
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(1)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(1)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(1)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(1)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(1)').textContent = '';
                                // table 7
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(1)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(1)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(1)').textContent = '';


                            } else {
                                const mainData = data[0];

                                const targetSR = daySelect.value
                                const targetData = data.find(item => item.SR == targetSR);
                                if (targetData) {
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(20)').textContent = targetData.SW_G_CU_INC_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(19)').textContent = targetData.SW_G_CU_TR_1_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(18)').textContent = targetData.SW_G_CU_TR_2_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(17)').textContent = targetData.SW_G_CU_TR_3_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(16)').textContent = targetData.SW_G_CU_TR_5_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(15)').textContent = targetData.SW_G_CU_TR_RO_A || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(14)').textContent = targetData.SW_G_SF6_INC_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(13)').textContent = targetData.SW_G_SF6_TR_1_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(12)').textContent = targetData.SW_G_SF6_TR_2_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(11)').textContent = targetData.SW_G_SF6_TR_3_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(10)').textContent = targetData.SW_G_SF6_TR_5_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(9)').textContent = targetData.SW_G_SF6_TR_RO_A || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(8)').textContent = targetData.SW_G_ROOM_TEMP_A || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(7)').textContent = targetData.LV_SW_G_CU_MCC_1_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(6)').textContent = targetData.LV_SW_G_CU_MCC_2_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(5)').textContent = targetData.LV_SW_G_CU_MCC_3A_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(4)').textContent = targetData.LV_SW_G_CU_MCC_3_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(3)').textContent = targetData.LV_SW_G_CU_MCC_5_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(2)').textContent = targetData.LV_SW_G_CU_MCC_RS_A || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(1)').textContent = targetData.LV_SW_G_ROOM_TEMP_A || '';

                                    //2
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(20)').textContent = targetData.SW_G_CU_INC_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(19)').textContent = targetData.SW_G_CU_TR_1_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(18)').textContent = targetData.SW_G_CU_TR_2_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(17)').textContent = targetData.SW_G_CU_TR_3_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(16)').textContent = targetData.SW_G_CU_TR_5_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(15)').textContent = targetData.SW_G_CU_TR_RO_B || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(14)').textContent = targetData.SW_G_SF6_INC_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(13)').textContent = targetData.SW_G_SF6_TR_1_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(12)').textContent = targetData.SW_G_SF6_TR_2_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(11)').textContent = targetData.SW_G_SF6_TR_3_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(10)').textContent = targetData.SW_G_SF6_TR_5_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(9)').textContent = targetData.SW_G_SF6_TR_RO_B || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(8)').textContent = targetData.SW_G_ROOM_TEMP_B || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(7)').textContent = targetData.LV_SW_G_CU_MCC_1_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(6)').textContent = targetData.LV_SW_G_CU_MCC_2_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(5)').textContent = targetData.LV_SW_G_CU_MCC_3A_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(4)').textContent = targetData.LV_SW_G_CU_MCC_3_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(3)').textContent = targetData.LV_SW_G_CU_MCC_5_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(2)').textContent = targetData.LV_SW_G_CU_MCC_RS_B || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(1)').textContent = targetData.LV_SW_G_ROOM_TEMP_B || '';

                                    //3
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(20)').textContent = targetData.SW_G_CU_INC_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(19)').textContent = targetData.SW_G_CU_TR_1_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(18)').textContent = targetData.SW_G_CU_TR_2_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(17)').textContent = targetData.SW_G_CU_TR_3_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(16)').textContent = targetData.SW_G_CU_TR_5_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(15)').textContent = targetData.SW_G_CU_TR_RO_C || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(14)').textContent = targetData.SW_G_SF6_INC_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(13)').textContent = targetData.SW_G_SF6_TR_1_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(12)').textContent = targetData.SW_G_SF6_TR_2_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(11)').textContent = targetData.SW_G_SF6_TR_3_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(10)').textContent = targetData.SW_G_SF6_TR_5_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(9)').textContent = targetData.SW_G_SF6_TR_RO_C || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(8)').textContent = targetData.SW_G_ROOM_TEMP_C || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(7)').textContent = targetData.LV_SW_G_CU_MCC_1_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(6)').textContent = targetData.LV_SW_G_CU_MCC_2_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(5)').textContent = targetData.LV_SW_G_CU_MCC_3A_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(4)').textContent = targetData.LV_SW_G_CU_MCC_3_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(3)').textContent = targetData.LV_SW_G_CU_MCC_5_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(2)').textContent = targetData.LV_SW_G_CU_MCC_RS_C || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(1)').textContent = targetData.LV_SW_G_ROOM_TEMP_C || '';
                                    // table 3
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(36)').textContent = targetData.M_08130_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(35)').textContent = targetData.M_08130_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(34)').textContent = targetData.M_08140_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(33)').textContent = targetData.M_08140_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(32)').textContent = targetData.M_08150_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(31)').textContent = targetData.M_08150_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(30)').textContent = targetData.M_08160_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(29)').textContent = targetData.M_08160_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(28)').textContent = targetData.M_08230_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(27)').textContent = targetData.M_08230_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(26)').textContent = targetData.M_08240_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(25)').textContent = targetData.M_08240_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(24)').textContent = targetData.M_08330_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(23)').textContent = targetData.M_08330_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(22)').textContent = targetData.M_08340_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(21)').textContent = targetData.M_08340_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(20)').textContent = targetData.M_08430_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(19)').textContent = targetData.M_08430_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(18)').textContent = targetData.M_09130_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(17)').textContent = targetData.M_09130_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(16)').textContent = targetData.M_09140_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(15)').textContent = targetData.M_09140_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(14)').textContent = targetData.M_09230_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(13)').textContent = targetData.M_09230_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(12)').textContent = targetData.M_09380_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(11)').textContent = targetData.M_09380_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(10)').textContent = targetData.M_09430_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(9)').textContent = targetData.M_09430_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(8)').textContent = targetData.M_10160_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(7)').textContent = targetData.M_10160_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(6)').textContent = targetData.M_04240_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(5)').textContent = targetData.M_04240_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(4)').textContent = targetData.M_04250_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(3)').textContent = targetData.M_04250_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(2)').textContent = targetData.M_10020_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(1)').textContent = targetData.M_10020_T_A || '';

                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(36)').textContent = targetData.M_08130_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(35)').textContent = targetData.M_08130_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(34)').textContent = targetData.M_08140_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(33)').textContent = targetData.M_08140_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(32)').textContent = targetData.M_08150_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(31)').textContent = targetData.M_08150_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(30)').textContent = targetData.M_08160_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(29)').textContent = targetData.M_08160_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(28)').textContent = targetData.M_08230_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(27)').textContent = targetData.M_08230_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(26)').textContent = targetData.M_08240_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(25)').textContent = targetData.M_08240_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(24)').textContent = targetData.M_08330_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(23)').textContent = targetData.M_08330_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(22)').textContent = targetData.M_08340_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(21)').textContent = targetData.M_08340_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(20)').textContent = targetData.M_08430_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(19)').textContent = targetData.M_08430_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(18)').textContent = targetData.M_09130_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(17)').textContent = targetData.M_09130_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(16)').textContent = targetData.M_09140_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(15)').textContent = targetData.M_09140_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(14)').textContent = targetData.M_09230_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(13)').textContent = targetData.M_09230_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(12)').textContent = targetData.M_09380_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(11)').textContent = targetData.M_09380_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(10)').textContent = targetData.M_09430_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(9)').textContent = targetData.M_09430_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(8)').textContent = targetData.M_10160_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(7)').textContent = targetData.M_10160_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(6)').textContent = targetData.M_04240_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(5)').textContent = targetData.M_04240_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(4)').textContent = targetData.M_04250_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(3)').textContent = targetData.M_04250_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(2)').textContent = targetData.M_10020_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(1)').textContent = targetData.M_10020_T_B || '';

                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(36)').textContent = targetData.M_08130_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(35)').textContent = targetData.M_08130_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(34)').textContent = targetData.M_08140_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(33)').textContent = targetData.M_08140_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(32)').textContent = targetData.M_08150_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(31)').textContent = targetData.M_08150_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(30)').textContent = targetData.M_08160_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(29)').textContent = targetData.M_08160_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(28)').textContent = targetData.M_08230_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(27)').textContent = targetData.M_08230_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(26)').textContent = targetData.M_08240_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(25)').textContent = targetData.M_08240_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(24)').textContent = targetData.M_08330_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(23)').textContent = targetData.M_08330_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(22)').textContent = targetData.M_08340_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(21)').textContent = targetData.M_08340_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(20)').textContent = targetData.M_08430_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(19)').textContent = targetData.M_08430_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(18)').textContent = targetData.M_09130_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(17)').textContent = targetData.M_09130_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(16)').textContent = targetData.M_09140_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(15)').textContent = targetData.M_09140_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(14)').textContent = targetData.M_09230_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(13)').textContent = targetData.M_09230_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(12)').textContent = targetData.M_09380_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(11)').textContent = targetData.M_09380_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(10)').textContent = targetData.M_09430_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(9)').textContent = targetData.M_09430_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(8)').textContent = targetData.M_10160_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(7)').textContent = targetData.M_10160_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(6)').textContent = targetData.M_04240_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(5)').textContent = targetData.M_04240_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(4)').textContent = targetData.M_04250_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(3)').textContent = targetData.M_04250_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(2)').textContent = targetData.M_10020_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(1)').textContent = targetData.M_10020_T_C || '';
                                    // table 4
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(32)').textContent = targetData.M_13020_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(31)').textContent = targetData.M_13020_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(32)').textContent = targetData.M_13020_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(31)').textContent = targetData.M_13020_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(32)').textContent = targetData.M_13020_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(31)').textContent = targetData.M_13020_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(30)').textContent = targetData.M_13025_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(29)').textContent = targetData.M_13025_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(30)').textContent = targetData.M_13025_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(29)').textContent = targetData.M_13025_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(30)').textContent = targetData.M_13025_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(29)').textContent = targetData.M_13025_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(28)').textContent = targetData.M_13040_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(27)').textContent = targetData.M_13040_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(28)').textContent = targetData.M_13040_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(27)').textContent = targetData.M_13040_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(28)').textContent = targetData.M_13040_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(27)').textContent = targetData.M_13040_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(26)').textContent = targetData.M_13045_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(25)').textContent = targetData.M_13045_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(26)').textContent = targetData.M_13045_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(25)').textContent = targetData.M_13045_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(26)').textContent = targetData.M_13045_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(25)').textContent = targetData.M_13045_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(24)').textContent = targetData.M_13060_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(23)').textContent = targetData.M_13060_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(24)').textContent = targetData.M_13060_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(23)').textContent = targetData.M_13060_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(24)').textContent = targetData.M_13060_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(23)').textContent = targetData.M_13040_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(22)').textContent = targetData.M_13065_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(21)').textContent = targetData.M_13065_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(22)').textContent = targetData.M_13065_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(21)').textContent = targetData.M_13065_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(22)').textContent = targetData.M_13065_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(21)').textContent = targetData.M_13065_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(20)').textContent = targetData.M_13080_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(19)').textContent = targetData.M_13080_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(20)').textContent = targetData.M_13080_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(19)').textContent = targetData.M_13080_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(20)').textContent = targetData.M_13080_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(19)').textContent = targetData.M_13080_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(18)').textContent = targetData.M_13085_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(17)').textContent = targetData.M_13085_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(18)').textContent = targetData.M_13085_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(17)').textContent = targetData.M_13085_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(18)').textContent = targetData.M_13085_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(17)').textContent = targetData.M_13085_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(16)').textContent = targetData.M_13100_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(15)').textContent = targetData.M_13100_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(16)').textContent = targetData.M_13100_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(15)').textContent = targetData.M_13100_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(16)').textContent = targetData.M_13100_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(15)').textContent = targetData.M_13100_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(14)').textContent = targetData.M_13105_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(13)').textContent = targetData.M_13105_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(14)').textContent = targetData.M_13105_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(13)').textContent = targetData.M_13105_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(14)').textContent = targetData.M_13105_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(13)').textContent = targetData.M_13105_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(12)').textContent = targetData.M_13120_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(11)').textContent = targetData.M_13120_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(12)').textContent = targetData.M_13120_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(11)').textContent = targetData.M_13120_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(12)').textContent = targetData.M_13120_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(11)').textContent = targetData.M_13120_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(10)').textContent = targetData.M_13125_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(9)').textContent = targetData.M_13125_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(10)').textContent = targetData.M_13125_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(9)').textContent = targetData.M_13125_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(10)').textContent = targetData.M_13125_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(9)').textContent = targetData.M_13125_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(8)').textContent = targetData.M_13140_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(7)').textContent = targetData.M_13140_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(8)').textContent = targetData.M_13140_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(7)').textContent = targetData.M_13140_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(8)').textContent = targetData.M_13140_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(7)').textContent = targetData.M_13140_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(6)').textContent = targetData.M_13145_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(5)').textContent = targetData.M_13145_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(6)').textContent = targetData.M_13145_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(5)').textContent = targetData.M_13145_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(6)').textContent = targetData.M_13145_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(5)').textContent = targetData.M_13145_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(4)').textContent = targetData.M_13160_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(3)').textContent = targetData.M_13160_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(4)').textContent = targetData.M_13160_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(3)').textContent = targetData.M_13160_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(4)').textContent = targetData.M_13160_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(3)').textContent = targetData.M_13160_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(2)').textContent = targetData.M_13165_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(1)').textContent = targetData.M_13165_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(2)').textContent = targetData.M_13165_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(1)').textContent = targetData.M_13165_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(2)').textContent = targetData.M_13165_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(1)').textContent = targetData.M_13165_T_C || '';

                                    // table 5  
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(32)').textContent = targetData.M_05840_A_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(31)').textContent = targetData.M_05840_T_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(32)').textContent = targetData.M_05840_A_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(31)').textContent = targetData.M_05840_T_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(32)').textContent = targetData.M_05840_A_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(31)').textContent = targetData.M_05840_T_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(30)').textContent = targetData.M_05845_A_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(29)').textContent = targetData.M_05845_T_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(30)').textContent = targetData.M_05845_A_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(29)').textContent = targetData.M_05845_T_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(30)').textContent = targetData.M_05845_A_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(29)').textContent = targetData.M_05845_T_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(28)').textContent = targetData.M_05850_A_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(27)').textContent = targetData.M_05850_T_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(28)').textContent = targetData.M_05850_A_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(27)').textContent = targetData.M_05850_T_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(28)').textContent = targetData.M_05850_A_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(27)').textContent = targetData.M_05850_T_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(26)').textContent = targetData.M_13210_A_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(25)').textContent = targetData.M_13210_T_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(26)').textContent = targetData.M_13210_A_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(25)').textContent = targetData.M_13210_T_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(26)').textContent = targetData.M_13210_A_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(25)').textContent = targetData.M_13210_T_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(24)').textContent = targetData.M_13220_A_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(23)').textContent = targetData.M_13220_T_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(24)').textContent = targetData.M_13220_A_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(23)').textContent = targetData.M_13220_T_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(24)').textContent = targetData.M_13220_A_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(23)').textContent = targetData.M_13220_T_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(22)').textContent = targetData.M_13230_A_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(21)').textContent = targetData.M_13230_T_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(22)').textContent = targetData.M_13230_A_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(21)').textContent = targetData.M_13230_T_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(22)').textContent = targetData.M_13230_A_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(21)').textContent = targetData.M_13230_T_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(20)').textContent = targetData.M_10120_A_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(19)').textContent = targetData.M_10120_T_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(20)').textContent = targetData.M_10120_A_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(19)').textContent = targetData.M_10120_T_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(20)').textContent = targetData.M_10120_A_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(19)').textContent = targetData.M_10120_T_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(18)').textContent = targetData.M_10640_A_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(17)').textContent = targetData.M_10640_T_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(18)').textContent = targetData.M_10640_A_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(17)').textContent = targetData.M_10640_T_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(18)').textContent = targetData.M_10640_A_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(17)').textContent = targetData.M_10640_T_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(16)').textContent = targetData.TR_TR1_AMP_A || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(15)').textContent = targetData.TR_TR1_WTI_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(14)').textContent = targetData.TR_TR1_OTI_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(16)').textContent = targetData.TR_TR1_AMP_B || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(15)').textContent = targetData.TR_TR1_WTI_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(14)').textContent = targetData.TR_TR1_OTI_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(16)').textContent = targetData.TR_TR1_AMP_C || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(15)').textContent = targetData.TR_TR1_WTI_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(14)').textContent = targetData.TR_TR1_OTI_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(13)').textContent = targetData.TR_TR2_AMP_A || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(12)').textContent = targetData.TR_TR2_WTI_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(11)').textContent = targetData.TR_TR2_OTI_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(13)').textContent = targetData.TR_TR2_AMP_B || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(12)').textContent = targetData.TR_TR2_WTI_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(11)').textContent = targetData.TR_TR2_OTI_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(13)').textContent = targetData.TR_TR2_AMP_C || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(12)').textContent = targetData.TR_TR2_WTI_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(11)').textContent = targetData.TR_TR2_OTI_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(10)').textContent = targetData.TR_TR3_AMP_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(9)').textContent = targetData.TR_TR3_WTI_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(8)').textContent = targetData.TR_TR3_OTI_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(10)').textContent = targetData.TR_TR3_AMP_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(9)').textContent = targetData.TR_TR3_WTI_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(8)').textContent = targetData.TR_TR3_OTI_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(10)').textContent = targetData.TR_TR3_AMP_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(9)').textContent = targetData.TR_TR3_WTI_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(8)').textContent = targetData.TR_TR3_OTI_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(7)').textContent = targetData.TR_TR5_AMP_A || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(6)').textContent = targetData.TR_TR5_WTI_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(5)').textContent = targetData.TR_TR5_OTI_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(7)').textContent = targetData.TR_TR5_AMP_B || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(6)').textContent = targetData.TR_TR5_WTI_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(5)').textContent = targetData.TR_TR5_OTI_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(7)').textContent = targetData.TR_TR5_AMP_C || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(6)').textContent = targetData.TR_TR5_WTI_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(5)').textContent = targetData.TR_TR5_OTI_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(4)').textContent = targetData.TR_TRRO_AMP_A || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(3)').textContent = targetData.TR_TRRO_WTI_A || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(2)').textContent = targetData.TR_TRRO_OTI_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(4)').textContent = targetData.TR_TRRO_AMP_B || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(3)').textContent = targetData.TR_TRRO_WTI_B || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(2)').textContent = targetData.TR_TRRO_OTI_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(4)').textContent = targetData.TR_TRRO_AMP_C || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(3)').textContent = targetData.TR_TRRO_WTI_C || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(2)').textContent = targetData.TR_TRRO_OTI_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(1)').textContent = targetData.TR_REMARKS_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(1)').textContent = targetData.TR_REMARKS_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(1)').textContent = targetData.TR_REMARKS_C || '';

                                    // table 6
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(18)').textContent = targetData.BCVFD_08130_INV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(17)').textContent = targetData.BCVFD_08130_CNV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(18)').textContent = targetData.BCVFD_08130_INV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(17)').textContent = targetData.BCVFD_08130_CNV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(18)').textContent = targetData.BCVFD_08130_INV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(17)').textContent = targetData.BCVFD_08130_CNV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(18)').textContent = targetData.BCVFD_08130_INV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(17)').textContent = targetData.BCVFD_08130_CNV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(18)').textContent = targetData.BCVFD_08130_INV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(17)').textContent = targetData.BCVFD_08130_CNV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(18)').textContent = targetData.BCVFD_08130_INV_5_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(17)').textContent = targetData.BCVFD_08130_CNV_5_AM || '';

                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(16)').textContent = targetData.BCVFD_08140_INV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(15)').textContent = targetData.BCVFD_08140_CNV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(16)').textContent = targetData.BCVFD_08140_INV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(15)').textContent = targetData.BCVFD_08140_CNV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(16)').textContent = targetData.BCVFD_08140_INV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(15)').textContent = targetData.BCVFD_08140_CNV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(16)').textContent = targetData.BCVFD_08140_INV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(15)').textContent = targetData.BCVFD_08140_CNV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(16)').textContent = targetData.BCVFD_08140_INV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(15)').textContent = targetData.BCVFD_08140_CNV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(16)').textContent = targetData.BCVFD_08140_INV_5_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(15)').textContent = targetData.BCVFD_08140_CNV_5_AM || '';

                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(14)').textContent = targetData.BCVFD_08150_INV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(13)').textContent = targetData.BCVFD_08150_CNV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(14)').textContent = targetData.BCVFD_08150_INV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(13)').textContent = targetData.BCVFD_08150_CNV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(14)').textContent = targetData.BCVFD_08150_INV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(13)').textContent = targetData.BCVFD_08150_CNV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(14)').textContent = targetData.BCVFD_08150_INV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(13)').textContent = targetData.BCVFD_08150_CNV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(14)').textContent = targetData.BCVFD_08150_INV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(13)').textContent = targetData.BCVFD_08150_CNV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(14)').textContent = targetData.BCVFD_08150_INV_5_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(13)').textContent = targetData.BCVFD_08150_CNV_5_AM || '';

                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(12)').textContent = targetData.BCVFD_08160_INV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(11)').textContent = targetData.BCVFD_08160_CNV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(12)').textContent = targetData.BCVFD_08160_INV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(11)').textContent = targetData.BCVFD_08160_CNV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(12)').textContent = targetData.BCVFD_08160_INV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(11)').textContent = targetData.BCVFD_08160_CNV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(12)').textContent = targetData.BCVFD_08160_INV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(11)').textContent = targetData.BCVFD_08160_CNV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(12)').textContent = targetData.BCVFD_08160_INV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(11)').textContent = targetData.BCVFD_08160_CNV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(12)').textContent = targetData.BCVFD_08160_INV_5_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(11)').textContent = targetData.BCVFD_08160_CNV_5_AM || '';

                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(10)').textContent = targetData.BCVFD_08230_INV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(9)').textContent = targetData.BCVFD_08230_CNV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(10)').textContent = targetData.BCVFD_08230_INV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(9)').textContent = targetData.BCVFD_08230_CNV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(10)').textContent = targetData.BCVFD_08230_INV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(9)').textContent = targetData.BCVFD_08230_CNV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(10)').textContent = targetData.BCVFD_08230_INV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(9)').textContent = targetData.BCVFD_08230_CNV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(10)').textContent = targetData.BCVFD_08230_INV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(9)').textContent = targetData.BCVFD_08230_CNV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(10)').textContent = targetData.BCVFD_08230_INV_5_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(9)').textContent = targetData.BCVFD_08230_CNV_5_AM || '';

                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(8)').textContent = targetData.BCVFD_08240_INV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(7)').textContent = targetData.BCVFD_08240_CNV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(8)').textContent = targetData.BCVFD_08240_INV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(7)').textContent = targetData.BCVFD_08240_CNV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(8)').textContent = targetData.BCVFD_08240_INV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(7)').textContent = targetData.BCVFD_08240_CNV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(8)').textContent = targetData.BCVFD_08240_INV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(7)').textContent = targetData.BCVFD_08240_CNV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(8)').textContent = targetData.BCVFD_08240_INV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(7)').textContent = targetData.BCVFD_08240_CNV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(8)').textContent = targetData.BCVFD_08240_INV_5_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(7)').textContent = targetData.BCVFD_08240_CNV_5_AM || '';

                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(6)').textContent = targetData.BCVFD_08330_INV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(5)').textContent = targetData.BCVFD_08330_CNV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(6)').textContent = targetData.BCVFD_08330_INV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(5)').textContent = targetData.BCVFD_08330_CNV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(6)').textContent = targetData.BCVFD_08330_INV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(5)').textContent = targetData.BCVFD_08330_CNV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(6)').textContent = targetData.BCVFD_08330_INV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(5)').textContent = targetData.BCVFD_08330_CNV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(6)').textContent = targetData.BCVFD_08330_INV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(5)').textContent = targetData.BCVFD_08330_CNV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(6)').textContent = targetData.BCVFD_08330_INV_5_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(5)').textContent = targetData.BCVFD_08330_CNV_5_AM || '';

                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(4)').textContent = targetData.BCVFD_08340_INV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(3)').textContent = targetData.BCVFD_08340_CNV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(4)').textContent = targetData.BCVFD_08340_INV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(3)').textContent = targetData.BCVFD_08340_CNV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(4)').textContent = targetData.BCVFD_08340_INV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(3)').textContent = targetData.BCVFD_08340_CNV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(4)').textContent = targetData.BCVFD_08340_INV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(3)').textContent = targetData.BCVFD_08340_CNV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(4)').textContent = targetData.BCVFD_08340_INV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(3)').textContent = targetData.BCVFD_08340_CNV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(4)').textContent = targetData.BCVFD_08340_INV_5_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(3)').textContent = targetData.BCVFD_08340_CNV_5_AM || '';

                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(2)').textContent = targetData.BCVFD_08430_INV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(1)').textContent = targetData.BCVFD_08430_CNV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(2)').textContent = targetData.BCVFD_08430_INV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(1)').textContent = targetData.BCVFD_08430_CNV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(2)').textContent = targetData.BCVFD_08430_INV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(1)').textContent = targetData.BCVFD_08430_CNV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(2)').textContent = targetData.BCVFD_08430_INV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(1)').textContent = targetData.BCVFD_08430_CNV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(2)').textContent = targetData.BCVFD_08430_INV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(1)').textContent = targetData.BCVFD_08430_CNV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(2)').textContent = targetData.BCVFD_08430_INV_5_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(1)').textContent = targetData.BCVFD_08430_CNV_5_AM || '';

                                    // table 7
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(14)').textContent = targetData.ENE_MCC_1_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(13)').textContent = targetData.ENE_MCC_2_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(12)').textContent = targetData.ENE_MCC_3_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(11)').textContent = targetData.ENE_MCC_3A_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(10)').textContent = targetData.ENE_MCC_5_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(9)').textContent = targetData.ENE_AIR_COMPRESSOR_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(8)').textContent = targetData.ENE_COMP_FROM_MCC_3_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(7)').textContent = targetData.ENE_RO_PLANT_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(6)').textContent = targetData.ENE_K_SILO_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(5)').textContent = targetData.ENE_PACKING_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(4)').textContent = targetData.ENE_RAW_SUGAR_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(3)').textContent = targetData.ENE_MCC_2B_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(2)').textContent = targetData.ENE_B_CONVEYOR_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(1)').textContent = targetData.ENE_COMPRESSOR_A || '';
                                }





                            }
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                        });
                }
            }
            //********************************************************************************************* */
            function updatePageData2() {
                let selectedYear = yearSelect.value;
                let selectedmonth = monthSelect.value;
                let selectday = daySelect.value;
                clearAllCells();
                let targetSR2 = daySelect.value - 1;
                if (targetSR2 < 1 && selectedmonth == 1 && selectedYear == 2025) {
                    targetSR2 = 1;
                } else if (targetSR2 < 1 && selectedmonth == 1) {
                    targetSR2 = 31;
                    selectedmonth = 12;
                    selectedYear = selectedYear - 1;
                } else if (targetSR2 < 1) {
                    if (selectedmonth == 5 || selectedmonth == 7 || selectedmonth == 10 || selectedmonth == 12) {
                        targetSR2 = 30;
                    } else {
                        targetSR2 = 31;
                    }

                    selectedmonth = selectedmonth - 1;
                }

                if (selectedYear && selectedmonth) {
                    fetch(`/fetch_Logbook_data.php?breaker=${selectedmonth}&year=${selectedYear}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                console.error(data.error);
                                // مسح البيانات من الجدول إذا حدث خطأ
                            } else {
                                const mainData = data[0];

                                const targetData2 = data.find(item => item.SR == targetSR2);
                                if (targetData2) {
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(14)').textContent = targetData2.ENE_MCC_1_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(13)').textContent = targetData2.ENE_MCC_2_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(12)').textContent = targetData2.ENE_MCC_3_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(11)').textContent = targetData2.ENE_MCC_3A_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(10)').textContent = targetData2.ENE_MCC_5_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(9)').textContent = targetData2.ENE_AIR_COMPRESSOR_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(8)').textContent = targetData2.ENE_COMP_FROM_MCC_3_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(7)').textContent = targetData2.ENE_RO_PLANT_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(6)').textContent = targetData2.ENE_K_SILO_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(5)').textContent = targetData2.ENE_PACKING_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(4)').textContent = targetData2.ENE_RAW_SUGAR_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(3)').textContent = targetData2.ENE_MCC_2B_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(2)').textContent = targetData2.ENE_B_CONVEYOR_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(1)').textContent = targetData2.ENE_COMPRESSOR_A || '';
                                }
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                        });
                }
            }

            function calculating() {
                function calculateCell(column) {
                    const selectorBase = `table:nth-of-type(7) tr:nth-child`;

                    // الحصول على العناصر أولاً
                    const element5 = document.querySelector(`${selectorBase}(5) td:nth-child(${column})`);
                    const element4 = document.querySelector(`${selectorBase}(4) td:nth-child(${column})`);
                    const resultElement = document.querySelector(`${selectorBase}(6) td:nth-child(${column})`);

                    // التحقق من وجود العناصر
                    if (!element5 || !element4 || !resultElement) {
                        console.error(`❌ عنصر غير موجود للعمود ${column}`);
                        return;
                    }

                    // عرض القيم الفعلية في الكونسول
                    console.log(`📊 العمود ${column}:`);
                    console.log(`الصف 5: '${element5.textContent}'`);
                    console.log(`الصف 4: '${element4.textContent}'`);

                    // تحويل القيم إلى أرقام
                    const value5 = parseInt(element5.textContent);
                    const value4 = parseInt(element4.textContent);

                    // التحقق إذا كانت القيم أرقاماً صحيحة
                    if (isNaN(value5) || isNaN(value4)) {
                        console.error(`❌ قيم غير رقمية في العمود ${column}`);
                        return;
                    }

                    // إجراء العملية الحسابية
                    resultElement.textContent = value5 - value4;
                    console.log(`✅ النتيجة: ${value5} - ${value4} = ${value5 - value4}`);
                }

                calculateCell(13);
                calculateCell(14);
            }

            // نسخة بديلة باستخدام querySelectorAll لأسلوب أكثر موثوقية
            function calculatingAlternative() {
                // الحصول على كل الجداول أولاً
                const tables = document.querySelectorAll('table');
                console.log(`عدد الجداول: ${tables.length}`);

                if (tables.length < 7) {
                    console.error('❌ لا يوجد جدول سابع');
                    return;
                }

                const table = tables[6]; // الجدول السابع (index 6)
                const rows = table.querySelectorAll('tr');
                console.log(`عدد الصفوف في الجدول: ${rows.length}`);

                if (rows.length < 6) {
                    console.error('❌ لا يوجد 6 صفوف في الجدول');
                    return;
                }

                // الصفوف (تذكر: index يبدأ من 0)
                const row4 = rows[3]; // الصف الرابع
                const row5 = rows[4]; // الصف الخامس  
                const row6 = rows[5]; // الصف السادس

                const cells4 = row4.querySelectorAll('td');
                const cells5 = row5.querySelectorAll('td');
                const cells6 = row6.querySelectorAll('td');

                console.log(`عدد الخلايا في الصف 4: ${cells4.length}`);
                console.log(`عدد الخلايا في الصف 5: ${cells5.length}`);

                // العمود 13 و14 (تذكر: index يبدأ من 0)
                const columns = [12, 13]; // index 12 = العمود 13, index 13 = العمود 14

                columns.forEach(colIndex => {
                    if (cells4.length > colIndex && cells5.length > colIndex && cells6.length > colIndex) {
                        const value4 = parseInt(cells4[colIndex].textContent);
                        const value5 = parseInt(cells5[colIndex].textContent);

                        if (!isNaN(value4) && !isNaN(value5)) {
                            cells6[colIndex].textContent = value5 - value4;
                            console.log(`✅ العمود ${colIndex + 1}: ${value5} - ${value4} = ${value5 - value4}`);
                        } else {
                            console.error(`❌ قيم غير رقمية في العمود ${colIndex + 1}`);
                        }
                    } else {
                        console.error(`❌ العمود ${colIndex + 1} غير موجود`);
                    }
                });
            }

            // استدع الدالة مع تحسينات
            function calculatingImproved() {
                console.log('=== بدء الحساب ===');

                // حاول الطريقة الأولى
                calculating();

                // إذا لم تنجح، جرب الطريقة البديلة
                setTimeout(() => {
                    console.log('=== المحاولة بالطريقة البديلة ===');
                    calculatingAlternative();
                }, 1000);
            }

            // استدع الدالة المحسنة
            calculatingImproved();
            window.addEventListener('load', () => {
                loadSelection(yearSelect);
                loadSelection(monthSelect);
                loadSelection(daySelect);
                updatePageData();
                updatePageData2();
                calculating();
            });

            yearSelect.addEventListener('change', () => {
                saveSelection(yearSelect);
                updatePageData();
                updatePageData2();
                calculating();
            });

            monthSelect.addEventListener('change', () => {
                saveSelection(monthSelect);
                updatePageData();
                updatePageData2();
                calculating();
            });
            daySelect.addEventListener('change', () => {
                saveSelection(daySelect);
                updatePageData();
                updatePageData2();
                calculating();
            });

        });

        function clearAllCells() {
            // table2
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(1)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(2)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(3)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(4)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(5)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(6)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(7)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(8)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(9)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(10)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(11)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(12)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(13)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(14)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(15)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(16)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(17)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(18)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(19)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(20)').textContent = '';

            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(1)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(2)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(3)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(4)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(5)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(6)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(7)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(8)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(9)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(10)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(11)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(12)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(13)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(14)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(15)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(16)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(17)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(18)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(19)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(20)').textContent = '';

            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(1)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(2)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(3)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(4)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(5)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(6)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(7)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(8)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(9)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(10)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(11)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(12)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(13)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(14)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(15)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(16)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(17)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(18)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(19)').textContent = '';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(20)').textContent = '';

            // table 3
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(36)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(35)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(34)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(33)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(32)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(31)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(30)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(29)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(28)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(27)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(26)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(25)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(24)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(23)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(22)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(21)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(20)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(19)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(18)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(17)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(16)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(15)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(14)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(13)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(12)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(11)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(10)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(9)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(8)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(7)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(6)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(5)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(4)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(3)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(2)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(1)').textContent = '';

            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(36)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(35)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(34)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(33)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(32)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(31)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(30)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(29)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(28)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(27)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(26)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(25)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(24)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(23)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(22)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(21)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(20)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(19)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(18)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(17)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(16)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(15)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(14)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(13)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(12)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(11)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(10)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(9)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(8)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(7)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(6)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(5)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(4)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(3)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(2)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(1)').textContent = '';

            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(36)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(35)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(34)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(33)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(32)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(31)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(30)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(29)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(28)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(27)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(26)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(25)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(24)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(23)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(22)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(21)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(20)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(19)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(18)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(17)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(16)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(15)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(14)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(13)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(12)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(11)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(10)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(9)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(8)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(7)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(6)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(5)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(4)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(3)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(2)').textContent = '';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(1)').textContent = '';
            // TABLE 4 
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(32)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(31)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(30)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(29)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(28)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(27)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(26)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(25)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(24)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(23)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(22)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(21)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(20)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(19)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(18)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(17)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(16)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(15)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(14)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(13)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(12)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(11)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(10)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(9)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(8)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(7)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(6)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(5)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(4)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(3)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(2)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(1)').textContent = '';

            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(32)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(31)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(30)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(29)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(28)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(27)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(26)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(25)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(24)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(23)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(22)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(21)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(20)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(19)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(18)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(17)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(16)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(15)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(14)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(13)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(12)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(11)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(10)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(9)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(8)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(7)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(6)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(5)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(4)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(3)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(2)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(1)').textContent = '';

            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(32)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(31)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(30)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(29)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(28)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(27)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(26)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(25)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(24)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(23)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(22)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(21)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(20)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(19)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(18)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(17)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(16)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(15)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(14)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(13)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(12)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(11)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(10)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(9)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(8)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(7)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(6)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(5)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(4)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(3)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(2)').textContent = '';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(1)').textContent = '';
            // TABLE 5
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(32)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(31)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(30)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(29)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(28)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(26)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(27)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(25)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(24)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(23)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(22)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(21)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(20)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(19)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(18)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(17)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(16)').textContent = '';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(15)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(14)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(13)').textContent = '';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(12)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(11)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(10)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(9)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(8)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(7)').textContent = '';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(6)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(5)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(4)').textContent = '';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(3)').textContent = '';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(2)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(1)').textContent = '';

            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(32)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(31)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(30)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(29)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(28)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(26)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(27)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(25)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(24)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(23)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(22)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(21)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(20)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(19)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(18)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(17)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(16)').textContent = '';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(15)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(14)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(13)').textContent = '';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(12)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(11)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(10)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(9)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(8)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(7)').textContent = '';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(6)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(5)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(4)').textContent = '';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(3)').textContent = '';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(2)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(1)').textContent = '';

            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(32)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(31)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(30)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(29)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(28)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(26)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(27)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(25)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(24)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(23)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(22)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(21)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(20)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(19)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(18)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(17)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(16)').textContent = '';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(15)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(14)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(13)').textContent = '';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(12)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(11)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(10)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(9)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(8)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(7)').textContent = '';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(6)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(5)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(4)').textContent = '';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(3)').textContent = '';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(2)').textContent = '';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(1)').textContent = '';
            // table 6
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(18)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(17)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(16)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(15)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(14)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(13)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(12)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(11)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(10)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(9)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(8)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(7)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(6)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(5)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(4)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(3)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(2)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(1)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(18)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(17)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(16)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(15)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(14)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(13)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(12)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(11)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(10)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(9)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(8)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(7)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(6)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(5)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(4)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(3)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(2)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(1)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(18)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(17)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(16)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(15)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(14)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(13)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(12)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(11)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(10)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(9)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(8)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(7)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(6)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(5)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(4)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(3)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(2)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(1)').textContent = '';

            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(18)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(17)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(16)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(15)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(14)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(13)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(12)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(11)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(10)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(9)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(8)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(7)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(6)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(5)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(4)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(3)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(2)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(1)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(18)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(17)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(16)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(15)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(14)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(13)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(12)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(11)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(10)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(9)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(8)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(7)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(6)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(5)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(4)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(3)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(2)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(1)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(18)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(17)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(16)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(15)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(14)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(13)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(12)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(11)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(10)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(9)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(8)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(7)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(6)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(5)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(4)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(3)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(2)').textContent = '';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(1)').textContent = '';

            // table 7
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(14)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(13)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(12)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(11)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(10)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(9)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(8)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(7)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(6)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(5)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(4)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(3)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(2)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(1)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(14)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(13)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(12)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(11)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(10)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(9)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(8)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(7)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(6)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(5)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(4)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(3)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(2)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(1)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(14)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(13)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(12)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(11)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(10)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(9)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(8)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(7)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(6)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(5)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(4)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(3)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(2)').textContent = '';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(1)').textContent = '';
        }
    </script>
    <!-- table1 -->
    <table>
        <tr>
            <td></td>
            <td class='left-align'>Date</td>
            <td colspan='1' class='arabic-text'>YEMEN COMPANY FOR SUGAR REFINING , RASS ISSA , HODIEDAH<br>ELECTRICAL DEPARTMENT<br>REFINERY ELECTRICAL LOG BOOK</td>
            <td class='tdimg' rowspan='5'><img class='imgx' src='imgs/4.png' alt=''></td>
        </tr>

    </table>
    <!-- table2 -->
    <table>
        <tr>
            <td class="bisque" colspan='7'>LV SWITCH GEAR PANAL</td>
            <td class="bisque" colspan='13'>11 KV SWITCH GEAR PANAL</td>
            <td rowspan="3">SHIFT</td>
        </tr>
        <tr>
            <td rowspan="2">ROOM<br>TEMP.</td>
            <td colspan="6">CURRENT IN AMPERE</td>

            <td rowspan="2">ROOM<br>TEMP.</td>
            <td colspan="6">SF6 GAS PRESSURE IN KG</td>
            <td colspan="6">CURRENT IN AMPERE</td>
        </tr>
        <tr>
            <td>MCC-RS</td>
            <td>MCC-5</td>
            <td>MCC-3A</td>
            <td>MCC-3</td>
            <td>MCC-2</td>
            <td>MCC-1</td>

            <td>TR-RO</td>
            <td>TR-5</td>
            <td>TR-3</td>
            <td>TR-2</td>
            <td>TR-1</td>
            <td>INCOMER</td>

            <td>TR-RO</td>
            <td>TR-5</td>
            <td>TR-3</td>
            <td>TR-2</td>
            <td>TR-1</td>
            <td>INCOMER</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>A</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>B</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>C</td>
        </tr>
    </table>
    <!-- table3 -->
    <table>
        <tr>
            <td class="bisque" colspan='2'>DRYER</td>
            <td class="bisque" colspan='4'>REMELT LEQUOR <br> PUMP</td>
            <td class="bisque" colspan='2'>EXT FAN</td>
            <td class="bisque" colspan='10'>CONTINUOUS CENTERIFUGAL MOTORS</td>
            <td class="bisque" colspan='18'>BATCH CENTERIFUGAL MOTORS</td>
            <td rowspan="3">SHIFT</td>
        </tr>
        <tr>
            <td colspan="2">10020</td>
            <td colspan="2">04250</td>
            <td colspan="2">04240</td>
            <td colspan="2">10160</td>

            <td colspan="2">09430</td>
            <td colspan="2">09380</td>
            <td colspan="2">09230</td>
            <td colspan="2">09140</td>
            <td colspan="2">09130</td>
            <td colspan="2">08430</td>
            <td colspan="2">08340</td>
            <td colspan="2">08330</td>
            <td colspan="2">08240</td>
            <td colspan="2">08230</td>
            <td colspan="2">08160</td>
            <td colspan="2">08150</td>
            <td colspan="2">08140</td>
            <td colspan="2">08130</td>
        </tr>
        <tr>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>A</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>B</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>c</td>
        </tr>
    </table>
    <!-- table 4 -->
    <table>
        <tr>
            <td class="bisque" colspan='32'>ACC FANS MOTORS</td>
            <td rowspan="3">SHIFT</td>
        </tr>
        <tr>
            <td colspan="2">13165</td>
            <td colspan="2">13160</td>
            <td colspan="2">13145</td>
            <td colspan="2">13140</td>

            <td colspan="2">13125</td>
            <td colspan="2">13120</td>
            <td colspan="2">13105</td>
            <td colspan="2">13100</td>

            <td colspan="2">13085</td>
            <td colspan="2">13080</td>
            <td colspan="2">13065</td>
            <td colspan="2">13060</td>

            <td colspan="2">13045</td>
            <td colspan="2">13040</td>
            <td colspan="2">13025</td>
            <td colspan="2">13020</td>
        </tr>
        <tr>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>A</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>B</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>c</td>
        </tr>
    </table>
    <!-- table 5 -->
    <table>
        <tr>
            <td class="bisque" colspan='20'>TRANSFORMERS OBSERVATIONS</td>
            <td class="bisque" colspan='4'>RADIAL FANS</td>
            <td class="bisque" colspan='6'>VACUME PUMP MOTORS</td>
            <td class="bisque" colspan='6'>CO2 PUMP MOTORS</td>
            <td rowspan="3">SHIFT</td>
        </tr>
        <tr>
            <td rowspan="2" colspan="5">REMARKS</td>
            <td colspan="3">TR-RO</td>
            <td colspan="3">TR-5</td>
            <td colspan="3">TR-3</td>
            <td colspan="3">TR-2</td>
            <td colspan="3">TR-1</td>

            <td colspan="2">10640</td>
            <td colspan="2">10120</td>

            <td colspan="2">13230</td>
            <td colspan="2">13220</td>
            <td colspan="2">13210</td>

            <td colspan="2">05850</td>
            <td colspan="2">05245</td>
            <td colspan="2">05840</td>
        </tr>
        <tr>


            <td>OTI</td>
            <td>WTI</td>
            <td>AMP</td>

            <td>OTI</td>
            <td>WTI</td>
            <td>AMP</td>

            <td>OTI</td>
            <td>WTI</td>
            <td>AMP</td>

            <td>OTI</td>
            <td>WTI</td>
            <td>AMP</td>

            <td>OTI</td>
            <td>WTI</td>
            <td>AMP</td>

            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
        </tr>
        <tr>
            <td colspan="5"></td>

            <td>-</td>
            <td>-</td>
            <td></td>

            <td></td>
            <td>-</td>
            <td></td>

            <td></td>
            <td></td>
            <td></td>

            <td></td>
            <td>-</td>
            <td></td>

            <td></td>
            <td>-</td>
            <td></td>

            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>A</td>
        </tr>
        </tr>
        <tr>
            <td colspan="5"></td>

            <td>-</td>
            <td>-</td>
            <td></td>

            <td></td>
            <td>-</td>
            <td></td>

            <td></td>
            <td></td>
            <td></td>

            <td></td>
            <td>-</td>
            <td></td>

            <td></td>
            <td>-</td>
            <td></td>

            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>B</td>
        </tr>
        </tr>
        <tr>
            <td colspan="5"></td>

            <td>-</td>
            <td>-</td>
            <td></td>

            <td></td>
            <td>-</td>
            <td></td>

            <td></td>
            <td></td>
            <td></td>

            <td></td>
            <td>-</td>
            <td></td>

            <td></td>
            <td>-</td>
            <td></td>

            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>C</td>
        </tr>
    </table>
    <!-- table 6 -->
    <table>
        <tr>
            <td class="bisque" colspan='18'>BATCH CENTERIFUGAL VARIABLE FREQUENCY DEVICES</td>
            <td rowspan="3">SHIFT</td>
        </tr>
        <tr>
            <td colspan="2">08430</td>
            <td colspan="2">08340</td>
            <td colspan="2">08330</td>
            <td colspan="2">08240</td>
            <td colspan="2">08230</td>
            <td colspan="2">05160</td>
            <td colspan="2">08150</td>
            <td colspan="2">08140</td>
            <td colspan="2">08130</td>
        </tr>
        <tr>
            <td>CONV-TEMP</td>
            <td>INV-TEMP</td>
            <td>CONV-TEMP</td>
            <td>INV-TEMP</td>
            <td>CONV-TEMP</td>
            <td>INV-TEMP</td>
            <td>CONV-TEMP</td>
            <td>INV-TEMP</td>
            <td>CONV-TEMP</td>
            <td>INV-TEMP</td>
            <td>CONV-TEMP</td>
            <td>INV-TEMP</td>
            <td>CONV-TEMP</td>
            <td>INV-TEMP</td>
            <td>CONV-TEMP</td>
            <td>INV-TEMP</td>
            <td>CONV-TEMP</td>
            <td>INV-TEMP</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="direction: ltr;">9 AM</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="direction: ltr;">1 PM</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="direction: ltr;">5 PM</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="direction: ltr;">9 PM</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="direction: ltr;">1 AM</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="direction: ltr;">5 AM</td>
        </tr>
    </table>
    <!-- table 7 -->
    <table>
        <tr>
            <td class="bisque" colspan='14'>ENERGY METERS READINGS</td>
            <td rowspan="3">TIME</td>
        </tr>
        <tr>
            <td>COMPRESSOR</td>
            <td>B-CONVEYOR</td>
            <td>MCC-2B</td>
            <td>RAW SUGAR</td>
            <td>PACKING</td>
            <td>K-SILO</td>
            <td>RO-PLANT</td>
            <td>COMP FROM MCC-3</td>
            <td>AIR COMPRESSOR</td>
            <td>MCC-5</td>
            <td>MCC-3A</td>
            <td>MCC-3</td>
            <td>MCC-2</td>
            <td>MCC-1</td>
        </tr>
        <tr>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="direction: ltr;">8 AM Pre</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="direction: ltr;">8 AM Final</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="direction: ltr;">CONSUNP.</td>
        </tr>
    </table>
    <!-- table 8 -->
    <table>
        <tr>
            <td class="greenyellow" colspan='24'>UBS OBSERVATION</td>
            <td rowspan="3">SHIFT</td>
        </tr>
        <tr>
            <td rowspan="2" colspan="5">REMARKS</td>
            <td rowspan="2" colspan="7">BATTERY TEMPERATURE</td>
            <td rowspan="2" colspan="3">INTERNAL TEMP.</td>
            <td colspan="2">ABNORMAL NOISE</td>
            <td colspan="3">OUTPUT CURRENT</td>
            <td colspan="2">OUTPUT VOLTAGR</td>
            <td colspan="2">BATTERY VOLTAGE</td>
        </tr>
        <tr>
            <td>NOT</td>
            <td>OK</td>
            <td>L3</td>
            <td>L2</td>
            <td>L1</td>
            <td>V2</td>
            <td>V1</td>
            <td>V2</td>
            <td>V1</td>
        </tr>
        <tr>
            <td colspan="5"></td>
            <td colspan="7"></td>
            <td colspan="3"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>A</td>
        </tr>
        <tr>
            <td colspan="5"></td>
            <td colspan="7"></td>
            <td colspan="3"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>B</td>
        </tr>
        <tr>
            <td colspan="5"></td>
            <td colspan="7"></td>
            <td colspan="3"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>C</td>
        </tr>
    </table>
    <!-- table 9 -->
    <table>
        <tr>
            <td class="greenyellow" colspan='5'>PLANT REFINERY CONSUMPTION</td>
            <td rowspan="2">TIME</td>
        </tr>
        <tr>
            <td>REMARKS</td>
            <td>KW/TON</td>
            <td>SUGAR PRODUCTION IN TON</td>
            <td>PACKING SECTION IN KWH</td>
            <td>REFINING PLANT IN KWH</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>TODAY</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>TO THIS MONTH</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>TO THIS YEWR</td>
        </tr>
    </table>
    <div class="eng">
        <h4>Eng</h4>
        <h4>Supervisor</h4>
        <h4>Head Section</h4>
    </div>
    <div class="tail">
        <h4>QF-ELEC-001-R00</h4>
    </div>

</body>

</html>