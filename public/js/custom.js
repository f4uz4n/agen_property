function strLimit(text, limit = 50, end = "...") {
  return text.length > limit ? text.substring(0, limit) + end : text;
}

function readMore(text, limit = 50) {
  if (text == undefined || text == null) {
    return "-";
  } else if (text?.length > limit) {
    return `<span class="str-limit">${strLimit(text, limit)}</span>
      <span class="str-full d-none" style="white-space: pre">${text}</span>
      <span class="badge badge-primary toggleReadMore">Read more</span>`;
  } else {
    return text;
  }
}

function shortColumn(data1, data2, maxLength = 50) {
  const result = (data1 ?? "-") + " / " + (data2 ?? "-");
  if (result.length > maxLength) {
    return (data1 ?? "-") + " /<br>" + (data2 ?? "-");
  }
  return result;
}

function formatAngka(angka, prefix = "") {
  if (typeof angka !== "number") angka = parseFloat(angka);
  if (isNaN(angka)) return `${prefix} 0`;

  return (
    prefix +
    angka.toLocaleString("id-ID", {
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    })
  );
}

function shortNumber(number) {
  const satuan = ['', 'Ribu', 'Juta', 'Miliyar', 'Triliun'];
  let nilai = Math.trunc(number);
  let i = 0;
  while (nilai >= 1000) {
    nilai /= 1000;
    i++;
  }

  return `Rp. ${nilai.toFixed(2)} ${satuan[i]}`;
}

function defaultValue(value, defaultValue = '') {
  return value === undefined || value === null || value === '' ? defaultValue : value;
}

function formatDate(sourceDate, format = "DD-MM-YYYY") {
  if (!sourceDate) return "-";
  const d = new Date(sourceDate);
  const options = {};

  switch (format) {
    case "DD-MM-YYYY":
      options.day = "2-digit";
      options.month = "2-digit";
      options.year = "numeric";
      break;
    case "DD MMM YYYY":
      options.day = "2-digit";
      options.month = "short";
      options.year = "numeric";
      break;
    case "DD MMMM YYYY":
      options.day = "2-digit";
      options.month = "long";
      options.year = "numeric";
      break;
    case "D-M-YYYY":
      options.day = "numeric";
      options.month = "numeric";
      options.year = "numeric";
      break;
    case "D-M-YY":
      options.day = "numeric";
      options.month = "numeric";
      options.year = "2-digit";
      break;
    default:
      options.day = "2-digit";
      options.month = "2-digit";
      options.year = "numeric";
      break;
  }

  return d.toLocaleDateString("id-ID", options).replace(/\//g, "-");
}

function get_bulan(bln) {
  const bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
  return bulan[parseInt(bln) - 1] || "";
}

function tanggal_indo(sourceDate, hari = false) {
  const d = new Date(sourceDate);

  const year = d.getFullYear();
  const month = d.getMonth() + 1;
  const day = d.getDate();
  const dayName = d.toLocaleString("default", { weekday: "short" });

  const dayNames = {
    Sun: "Minggu",
    Mon: "Senin",
    Tue: "Selasa",
    Wed: "Rabu",
    Thu: "Kamis",
    Fri: "Jum'at",
    Sat: "Sabtu",
  };
  const monthNames = {
    1: "Januari",
    2: "Februari",
    3: "Maret",
    4: "April",
    5: "Mei",
    6: "Juni",
    7: "Juli",
    8: "Agustus",
    9: "September",
    10: "Oktober",
    11: "November",
    12: "Desember",
  };

  const dayNameText = hari ? `${dayNames[dayName]}, ` : "";
  const monthName = monthNames[month];

  const date = `${dayNameText} ${day} ${monthName} ${year}`;

  return date;
}

function disabledInputSibling(selector) {
  $(document).on("change", selector, function () {
    const isEmpty = $(this).val() === "";
    $(this).closest(".col-md-6").next().find("input").prop("disabled", isEmpty);
  });
}

function handleModalClick({ selector, modalTitle, formActionUrl, findData, defaultValues, fieldMap }) {
  $(document).on("click", selector, function () {
    const id = $(this).data("id");
    const isEdit = !!id;
    const fullAction = isEdit ? formActionUrl(id) + id : formActionUrl(id);

    $(".modal-title").text(isEdit ? `Edit ${modalTitle}` : `Tambah ${modalTitle}`);
    $("form").attr("action", fullAction);

    const values = isEdit ? findData(id) || {} : {};
        
    fieldMap.inputs?.forEach(({ name, valueKey = name }) => {      
      const val = values[valueKey];
      const finalVal = val !== undefined && val !== null && val !== "" ? val : defaultValues?.[name] ?? "";
      $(`input[name="${name}"]`).val(finalVal);
    });

    fieldMap.selects?.forEach(({ name, valueKey = name, trigger = true }) => {
      const $select = $(`select[name="${name}"]`);
      let selectedValue = values?.[valueKey];

      if (selectedValue == undefined || selectedValue == null || selectedValue == "") {
        selectedValue = defaultValues?.[name] || "";
      }

      $select.val(selectedValue);
      if (trigger) $select.trigger("change");
    });
  });
}

function handleUpload(input) {
  if (input.files.length > 0) {
    input.form.submit();
  }
}

// init ulang datatable
function tableInit(selector) {
  $(selector).DataTable();
}

function tableExcel(selector) {
  const safeTitle = typeof title !== "undefined" ? title : "DataExport";
  $(selector).DataTable({
    dom: `
        <"row mt-2 justify-content-between"
          <"d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto mr-auto" Bl>
          <"d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ml-auto" f>
        >
        <"row mt-2 justify-content-between dt-layout-table"
          <"d-md-flex justify-content-between align-items-center col-12 dt-layout-full col-md" t>
        >
        <"row mt-2 justify-content-between"
          <"d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto mr-auto" i>
          <"d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ml-auto" p>
        >
    `,
    buttons: [
      {
        extend: "excel",
        text: '<i class="fa fa-file-excel mr-1"></i>Excel',
        className: "btn-success",
        title: null,
        filename: safeTitle + "_" + new Date().toISOString().split("T")[0], // lebih rapi
        exportOptions: {
          format: {
            body: function (data, row, column, node) {
              // Deteksi jika data mengandung pola angka ribuan atau desimal (misalnya: 1.234 atau 1.234,56)
              let pattern = /^-?\d{1,3}(\.\d{3})*(,\d+)?$/;
              if (pattern.test(data.trim())) {
                return data.replace(/\./g, "").replace(",", ".");
              }
              return data;
            },
          },
        },
      },
    ],
  });
}

function boolToHtmlStatus(status, type = "full", text = null) {
  if (status === null) {
    return "-";
  }

  const trueValue = ["Y", "Ya", "y", "ya", "1", 1, "Aktif", "aktif"];
  const textTrue = text ? text[0] : "Ya";
  const textFalse = text ? text[1] : "Tidak";

  const icon = trueValue.includes(status) ? "fa-circle-check text-success" : "fa-circle-xmark text-danger";
  const statusText = trueValue.includes(status) ? textTrue : textFalse;

  switch (type) {
    case "full":
      return `<div class="d-flex flex-row justify-content-center align-items-center">
            <i class="fa-regular ${icon} icon-md m-0"></i>
            <p class="mb-0 ml-1">${statusText}</p>
        </div>`;
    case "icon":
      return `<div class="d-flex flex-row justify-content-center align-items-center">
            <i class="fa-regular ${icon} icon-md m-0"></i>
        </div>`;
    case "text":
      return `<div class="d-flex flex-row justify-content-center align-items-center">
            <p class="mb-0 ml-1">${statusText}</p>
        </div>`;
    default:
      return `<div class="d-flex flex-row justify-content-center align-items-center">
            <i class="fa-regular ${icon} icon-md m-0"></i>
            <p class="mb-0 ml-1">${statusText}</p>
        </div>`;
  }
}

function randomProgressBar(selector, min = 0, max = 99) {
  const $selector = $(selector);
  const $progressBar = $('<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%"></div></div>');
  $selector.html($progressBar);
  let value = min;
  const intervalId = setInterval(() => {
    value = Math.min(value + 1, max);
    $progressBar.find(".progress-bar").css("width", `${value}%`).text(`${value}%`);
    if (value === max) {
      clearInterval(intervalId);
    }
  }, 100);
}

function generateRandomColor(count = 1) {
  let result = {
    backgroundColor: [],
    borderColor: [],
  };

  let backgroundColor = ["rgba(255, 99, 132, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(255, 206, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(255, 159, 64, 0.2)"];
  let borderColor = ["rgba(255,99,132, 1)", "rgba(54, 162, 235, 1)", "rgba(255, 206, 86, 1)", "rgba(75, 192, 192, 1)", "rgba(153, 102, 255, 1)", "rgba(255, 159, 64, 1)"];

  for (let i = 0; i < count; i++) {
    if (i < 6) {
      result.backgroundColor.push(backgroundColor[i]);
      result.borderColor.push(borderColor[i]);
    } else {
      let color = "rgba(";
      for (let i = 0; i < 3; i++) {
        color += Math.floor(Math.random() * 256) + ",";
      }
      result.backgroundColor.push(color + "0.2)");
      result.borderColor.push(color + "1)");
    }
  }
  return result;
}
