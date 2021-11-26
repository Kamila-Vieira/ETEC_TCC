const formValidators = {
  validCPF: function(input, label){
    const isValidCPF = ValidCPF.init(input.value)
    isValidCPF ? label.classList.remove('cpf-error') : label.classList.add('cpf-error')
  },
  validEmail: function(input, label){
    const isValidEmail = ValidEmail.init(input.value)
    isValidEmail ? label.classList.remove('email-error') : label.classList.add('email-error')
  },
  emptyField: function(input, label){
    input.value ? label.classList.remove('empty-error') : label.classList.add('empty-error')
  },
  repeatPassword: function(inputPassword, inputRepeatPassword, label){
    inputPassword?.value === inputRepeatPassword?.value ? label?.classList.remove('repeat-password-error') : label?.classList.add('repeat-password-error')
  },
  hasAnyError: function(form){
    let anyError = false
    const errors = {
      email: false,
      cpf: false,
      campoVazio: false,
      senha: false,
    }
    const errorLabels = form.querySelectorAll('.form-line-item,.repeat-password-message')
    for (let index = 0; index < errorLabels.length; index++) {
      const $label = errorLabels[index]
      if ($label.classList.contains('cpf-error') ||
          $label.classList.contains('email-error') ||
          $label.classList.contains('empty-error') ||
          $label.classList.contains('repeat-password-error')) {
        anyError = true;
        if (form.querySelector('.cpf-error')) errors.cpf = true
        if (form.querySelector('.email-error')) errors.email = true
        if (form.querySelector('.empty-error')) errors.campoVazio = true
        if (form.querySelector('.repeat-password-error')) errors.senha = true
        break;
      }
    }
    return {anyError, errors};
  }
}

const ValidCPF = {
  cpfClean: '',
  init: function(cpfSent){
    ValidCPF.cpfClean = cpfSent.replace(/\D+/g, "")
    return ValidCPF.valid()
  },
  valid: function () {
    if (typeof ValidCPF.cpfClean === "undefined") return false;
    if (ValidCPF.cpfClean.length !== 11) return false;
    if (ValidCPF.isSequence()) return false;
  
    const cpfPartial = ValidCPF.cpfClean.slice(0, -2);
    const firstDigit = ValidCPF.createDigit(cpfPartial);
    const secondDigit = ValidCPF.createDigit(cpfPartial + firstDigit);
  
    const newCpf = cpfPartial + firstDigit + secondDigit;
  
    return newCpf === ValidCPF.cpfClean;
  },
  createDigit: function (cpfPartial) {
    const cpfArray = Array.from(cpfPartial);
    let regressive = cpfArray.length + 1;
    const total = cpfArray.reduce((acc, val) => {
      acc += Number(val) * regressive;
      regressive--;
      return acc;
    }, 0);
    const digit = 11 - (total % 11);
    return digit > 9 ? "0" : String(digit);
  },
  isSequence: function () {
    const sequence = ValidCPF.cpfClean[0].repeat(ValidCPF.cpfClean.length);
    return ValidCPF.cpfClean === sequence;
  }
}

const ValidEmail = {
  init: function(emailSent){
    return ValidEmail.valid(emailSent)
  },
  valid: function (email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
  }
}

jQuery(function formMasks($){
  $(".form-line-item.celular input").mask("(99) 99999-9999");
  $(".form-line-item.cpf input").mask("999.999.999-99");
  $(".form-line-item.cep input").mask("99999-999");
});

function handlerSelectComboOption(label, input, list){
  const listOptions = list.querySelectorAll('li')
  listOptions.forEach(function(option){
    option.addEventListener('click', function() {
      const moduloInput = document.getElementById('moduloId')
      moduloInput.value = option.dataset.id
      input.value = option.dataset.value
      label.classList.remove('open')
      list.classList.remove('open')
    })
  })
}

(function handlerOpenSelect() {
  const selectCombos = document.querySelectorAll('.form-line-combo,.list-form-col.modulo')
  selectCombos.forEach(function(combo){
    const labelCombo = combo.querySelector('.form-line-item,.list-form-col-item.modulo')
    const inputCombo = combo.querySelector('.form-line-item > input,.list-form-col-item.modulo > input:first-child')
    const listCombo = combo.querySelector('.form-line-item-list,.list-form-col-item-list')
    labelCombo.addEventListener('click', function(e) {
      labelCombo.classList.toggle('open')
      listCombo.classList.toggle('open')
    })
    handlerSelectComboOption(labelCombo, inputCombo, listCombo)
  })
})();


(function handlerSubmitForm(){
  const $form = document.querySelector('form.form-main-content')
  const data = {}
  $form.addEventListener('submit', function handlerSubmit(e) { 
    $($form).trigger('submit')
    const formFields = e.currentTarget.querySelectorAll('.form-line-item')
    formFields.forEach(function(field){
      const inputField = field.querySelector('input')
      if (inputField.name) {
        if(inputField.name === 'cpf'){
          formValidators.validCPF(inputField, field)
        }
        if(inputField.name === 'email'){
          formValidators.validCPF(inputField, field)
        }
        formValidators.emptyField(inputField, field)
        data[inputField.name] = inputField.value
      }

      if (inputField.name === "senha") {
        const repeatPasswordInput = document.querySelector('.form-line-item.repetir-senha input')
        const repeatPasswordMessage = document.querySelector('.repeat-password-message')
        formValidators.repeatPassword(inputField, repeatPasswordInput, repeatPasswordMessage)
      }
    })
    const errorsContent = formValidators.hasAnyError(e.currentTarget)

    if(errorsContent.anyError){
      const errorMessagesContainer = document.querySelector('.message-errors-container')
      const { cpf, email, campoVazio, senha} = errorsContent.errors
      errorMessagesContainer.innerHTML = ''
      if (cpf) errorMessagesContainer.insertAdjacentHTML('beforeend', '<p class="cpf">- Preencha o campo CPF com um CPF válido</p>')
      if (email) errorMessagesContainer.insertAdjacentHTML('beforeend', '<p class="email">- Preencha o campo E-mail um e-mail válido</p>')
      if (campoVazio) errorMessagesContainer.insertAdjacentHTML('beforeend', '<p class="campoVazio">- Ainda há campos vázios</p>')
      if (senha) errorMessagesContainer.insertAdjacentHTML('beforeend', '<p class="senha">- As senhas precisam ser idênticas</p>')
    }else{
      $form.removeAttribute('target')
      $form.setAttribute('action', '/Controller/Navegacao.php')
    }
  }) 
})()