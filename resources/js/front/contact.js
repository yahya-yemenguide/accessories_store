(() => {
  const root = document.getElementById('darContact');
  if (!root || root.dataset.dkcInitialized) return;
  root.dataset.dkcInitialized = 'true';
  const feedback = root.querySelector('#dkcFeedback');
  const notify = (message) => { if (feedback) { feedback.textContent = message; feedback.dataset.status = 'notice'; } };
  root.querySelector('#dkcMessageForm')?.addEventListener('submit', (event) => {
    event.preventDefault();
    const form = event.currentTarget;
    if (!form.checkValidity()) { form.reportValidity(); return; }
    notify('هذه معاينة للتصميم فقط. لم يتم إرسال الرسالة أو حفظ أي بيانات.');
  });
  root.querySelector('[data-dkc-whatsapp]')?.addEventListener('click', () => notify('رابط واتساب المتجر يحتاج تأكيدًا قبل تفعيله.'));
  root.querySelectorAll('[data-dkc-social]').forEach(button => {
    button.addEventListener('click', () => notify(`رابط ${button.dataset.dkcSocial} سيُضاف بعد تأكيد حساب المتجر.`));
  });
})();
