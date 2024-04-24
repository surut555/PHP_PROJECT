var xmlHttp; //กำหนดตัวแปรแบบ Public
//ฟังก์ชันสำหรับตรวจสอบโปรแกรม web Browser
function createXMLHttpRequest() {
  xmlHttp = null; //เครียร์ค่าใน xmlHttp ก่อน
  if (window.ActiveXObject) {
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  } else if (window.XMLHttpRequest) {
    xmlHttp = new XMLHttpRequest();
  }
}
//ฟังก์ชันสำหรับตรวจสอบการเปลี่ยนแปลงสถานะการทำงาน
function handleStateChange() {
  xmlHttp.onReadyStateChange = function () {
    if (xmlHttp.readyState == 4) {
      if (xmlHttp.status == 200) {
        displayContent(xmlHttp.responseText);
      } else {
        errResult("พบข้อผิดพลาด" + xmlHttp.statusText);
      }
    }
  };
  xmlHttp.send(null);
}
//ฟังก์ชันสำหรับนำข้อมูลจาก Form เข้ารหัสก่อนส่งไปยัง Server
function getRequestBody(pForm) {
  var nParams = new Array();
  for (var i = 0; i < pForm.elements.length; i++) {
    var pParam = encodeURIComponent(pForm.elements[i].name);
    pParam += "=";
    pParam += encodeURIComponent(pForm.elements[i].value);
    nParams.push(pParam);
  }
  return nParams.join("&");
}
//ฟังก์ชันสำหรับแสดงข้อมูลในตำแหน่งแสดงเนื้อหา
function displayContent(pMessage) {
  document.getElementById("divContent").innerHTML = pMessage;
}
//ฟังก์ชันสำหรับแจ้งเตือนข้อผิดพลาด
function errResult(pMessage) {
  alert(pMessage); //แสดง Alert Box
}
//ฟังก์ชันสำหรับแสดงแบบฟอร์มสมัครสมัคสมาชิก โดยส่ง Request แบบ GET ไปยังไฟล์ "signup_form.php"
function showFormRegis() {
  createXMLHttpRequest();
  xmlHttp.open("get", "Member/signup_form.php", true);
  handleStateChange();
}
//ฟังก์ชันสำหรับตรวจสอบการกรอกข้อมูลในแบบฟอร์มสมัครสมาชิก
function validateRegis() {
  var user = document.getElementById("txtUser");
  var pwd = document.getElementById("txtPwd");
  var conpwd = document.getElementById("txtConfirmPwd");
  var email = document.getElementById("txtEmail");
  var question = document.getElementById("listQuestion");
  var answer = document.getElementById("txtAnswer");
  var firstname = document.getElementById("txtFirstName");
  var lastname = document.getElementById("txtLastName");
  var address = document.getElementById("txtAddress");
  var amphur = document.getElementById("txtAmphur");
  var province = document.getElementById("listProvince");
  var zipCode = document.getElementById("txtZipCode");
  var mobile = document.getElementById("txtMobile");
}
//เรียกใช้ฟังก์ชันสำหรับตรวจสอบการป้อนข้อมูลที่อยู่ในไฟล์ "all_control.js"
if (isAlphabet(user, "กรอกชื่อผู้ใช้เป็นตัวอักษรอังกฤษเท่านั้น")) {
  if (lengthRestrtiction(user, "ชื่อผู้ใช้", 4, 25)) {
    if (
      isAlphanumeric(pwd, "กรอกรหัสผ่านเป็นตัวอักษรอังกฤษและตัวเลขเท่านั้น")
    ) {
      if (lengthRestrtiction(pwd, "รหัสผ่าน", 4, 25)) {
        if (pwd.value != conpwd.value) {
          alert("รหัสผ่าน และยืนยันรหัสผ่านไม่ตรงกัน");
          return false;
        } else {
          if (emailValidator(email, "กรอกอีเมล์ให้ถูกต้อง")) {
            if ((madeSelection, "เลือกคำถาม")) {
              if (isEmpty(answer, "กรอกคำตอบ")) {
                if (isEmpty(firstname, "กรอกชื่อ")) {
                  if (isEmpty(lastname, "กรอกนามสกุล")) {
                    if (isEmpty(address, "กรอกที่อยู่")) {
                      if (isEmpty(amphur, "กรอกเขต/อำเภอ")) {
                        if (madeSelection(province, "เลือกจังหวัด")) {
                          if (isEmpty(zipCode, "กรอกรหัสไปรษณีย์")) {
                            if (
                              isNumeric(
                                zipCode,
                                "กรอกรหัสไปรษณีย์เป็นตัวเลข 5 หลักเท่านั้น"
                              )
                            ) {
                              processRegis();
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}
//ฟังก์ชันสำหรับส่งข้อมูลการสมัครสมาชิกจาก Form ด้วยวิธี POST ไปยังไฟล์ "signup_process.php"
function processRegis() {
  createXMLHttpRequest();
  var pForm = document.getElementById("frmRegis");
  var pBody = getRequestBody(pForm);
  xmlHttp.open("post", pForm.action, true);
  xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xmlHttp.onReadyStateChange = function () {
    if (xmlHttp.readyState == 4) {
      if (xmlHttp.readyState == 200) {
        if (xmlHttp.responseText == "repeat_user") {
          errResult("ชื่อผู้ใช้ซ้ำ กรุณาใช้อีเมล์อื่น");
        } else if (xmlHttp.responseText == "repeat_email") {
          errResult("อีเมล์ซ้ำ กรุณาใช้อีเมล์อื่น");
        } else {
          displayContent(xmlHttp.responseText);
        }
      } else {
        errResult("พบข้อผิดพลาด" + xmlHttp.statusText);
      }
    }
  };
  xmlHttp.send(pBody);
}

//ฟังก์ชันสำหรับแสดงหน้าจอเมนูสถานะไม่มีการเข้าสู่ระบบ
function showFormLogin() {
  createXMLHttpRequest();
  xmlHttp.open("get", "Member/login_form.php", true);
  xmlHttp.onReadyStateChange = function () {
    if (xmlHttp.readyState == 4) {
      if (xmlHttp.status == 200) {
        document.getElementById(divMember).innerHTML = xmlHttp.responseText;
        showMenuBar(); //แสดงเมนูตามสิทธิ์การใช้งานปัจจบัน
      } else {
        errResult("พบข้อผิดพลาด" + xmlHttp.statusText);
      }
    }
  };
  xmlHttp.send(null);
}

//ฟังก์ชันสำหรับตรวจสอบการกรอกข้อมูลเพื่อเข้าสู่ระบบ
function validateLogin(){
    var user = document.getElementById('txtUserName');
    var pwd = document.getElementById('txtPassword');
    if(isEmpty(user, "กรอกชื่อใช้")){
        if(isEmpty(pwd,"กรอกรหัสผ่าน")){
            processLogin(); //ถ้ากรอกข้อมูล ก็จะตรวจสอบสิทธิ์การเป็นสมาชิก
        }
    }
}
//ฟังก์ชันสำหรับ Select ข้อมูลสมาชิกเข้าสู่ระบบ
function processLogin(){
    
}
