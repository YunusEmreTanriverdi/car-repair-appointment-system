<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>Staj Projesi - Oto Servis Takip</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 750px;
            margin: 20px auto;
            background: #fff;
            padding: 20px 25px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.07);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
            color: #333;
        }

        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 15px;
            
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2980b9;
        }

        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
            border-radius: 6px;
            padding: 10px 15px;
            margin-bottom: 20px;
        }

        .alert-error {
            background-color: #f2dede;
            color: #a94442;
            border-radius: 6px;
            padding: 10px 15px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Oto Servis Takip</h1>

        
        <?php if(session('success')): ?>
        <div class="alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        
        <?php if(session('error')): ?>
        <div class="alert-error"><?php echo e(session('error')); ?></div>
        <?php endif; ?>

        
        <?php if($errors->any()): ?>
        <div class="alert-error">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($hata); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>

        
        <form id="servisForm" method="POST" action="<?php echo e(route('servis.kaydet')); ?>">
            <?php echo csrf_field(); ?>

            
            <label>Müşteri Ad Soyad:</label>
            <input type="text" name="ad_soyad" required>

            
            <div class="row">
                <div>
                    <label>Araç Markası:</label>
                    <select name="marka_id" id="marka" required>
                        <option value="">Seçiniz</option>
                        <?php $__currentLoopData = $markalar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marka): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($marka->id); ?>"><?php echo e($marka->ad); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div>
                    <label>Araç Modeli:</label>
                    <select name="model_id" id="model" required>
                        <option value="">Önce marka seçiniz</option>
                    </select>
                </div>
            </div>

            
            <div class="row">
                <div>
                    <label>Tamir Türü:</label>
                    <select name="tamir_turu_id" id="tamir_turu" required>
                        <option value="">Seçiniz</option>
                        <?php $__currentLoopData = $tamirTurleri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tur->id); ?>"><?php echo e($tur->ad); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div>
                    <label>Tamir Yeri:</label>
                    <select name="tamir_yeri_id" id="tamir_yeri" required>
                        <option value="">Önce tamir türü seçiniz</option>
                    </select>
                </div>
            </div>

            
            <div class="row">
                <div>
                    <label>Tamir Tarihi:</label>
                    <input type="text" id="date" name="tarih" required placeholder="Tarih seçiniz">
                </div>
                <div>
                    <label>Saat:</label>
                    <select name="saat" required>
                        <?php for($i=8; $i<=18; $i++): ?>
                            <option value="<?php echo e($i); ?>:00"><?php echo e($i); ?>:00</option>
                            <option value="<?php echo e($i); ?>:30"><?php echo e($i); ?>:30</option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>

            
            <label>Servis ile ilgili notlar:</label>
            <textarea name="servis_ile_ilgili_notlar" placeholder="Servis ile ilgili notlarınızı buraya yazınız"
                style="height: 100px;"></textarea>

            <button type="submit">Kaydet</button>
        </form>
    </div>

    <script>
        $.ajaxSetup({ 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#marka').on('change', function() {
            var markaId = $(this).val();
            if (markaId) {
                $.get('/modeller/' + markaId, function(data) {
                    $('#model').empty().append('<option value="">Seçiniz</option>');
                    $.each(data, function(i, model) {
                        $('#model').append('<option value="' + model.id + '">' + model.ad + '</option>');
                    });
                });
            } else {
                $('#model').empty().append('<option value="">Önce marka seçiniz</option>');
            }
        });

        $('#tamir_turu').on('change', function() {
            var turId = $(this).val();
            if (turId) {
                $.get('/tamir-yerleri/' + turId, function(data) {
                    $('#tamir_yeri').empty().append('<option value="">Seçiniz</option>');
                    $.each(data, function(i, yer) {
                        $('#tamir_yeri').append('<option value="' + yer.id + '">' + yer.ad + '</option>');
                    });
                });
            } else {
                $('#tamir_yeri').empty().append('<option value="">Önce tamir türü seçiniz</option>');
            }
        });

        flatpickr("#date", {
            dateFormat: "Y-m-d",
            clickOpens: true,
            minDate: "today"
        });
    </script>

</body>
</html>


<?php /**PATH C:\xampp\htdocs\Staj-Projesi\resources\views/StajProjesi.blade.php ENDPATH**/ ?>