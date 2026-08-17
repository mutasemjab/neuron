(() => {
  const cfg = window.SubscriptionCheckoutConfig;
  if (!cfg) return;

  const modal = document.getElementById('subModal');
  if (!modal) return;

  const stepForm    = document.getElementById('subStepForm');
  const stepLoading = document.getElementById('subStepLoading');
  const stepPayment = document.getElementById('subStepPayment');
  const stepResult  = document.getElementById('subStepResult');
  const loadingText = document.getElementById('subLoadingText');
  const form         = document.getElementById('subCheckoutForm');
  const formError     = document.getElementById('subFormError');
  const resultIcon   = document.getElementById('subResultIcon');
  const resultTitle  = document.getElementById('subResultTitle');
  const resultText   = document.getElementById('subResultText');
  const resultClose  = document.getElementById('subResultClose');
  const paymentContainer = document.getElementById('payment-form');

  let currentPlanId = null;

  function showStep(step) {
    [stepForm, stepLoading, stepPayment, stepResult].forEach(el => {
      el.style.display = el === step ? '' : 'none';
    });
  }

  function resetModal() {
    form.reset();
    formError.style.display = 'none';
    paymentContainer.innerHTML = '';
    showStep(stepForm);
  }

  function openModal(btn) {
    currentPlanId = btn.dataset.planId;
    document.getElementById('subPlanTitle').textContent = btn.dataset.planTitle || '';
    document.getElementById('subPlanPrice').textContent = btn.dataset.planPrice || '';
    document.getElementById('subPlanSuffix').textContent = btn.dataset.planSuffix || '';
    resetModal();
    modal.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    modal.classList.remove('open');
    document.body.style.overflow = '';
  }

  document.querySelectorAll('.plan-cta').forEach(btn => {
    btn.addEventListener('click', () => openModal(btn));
  });

  modal.querySelectorAll('[data-close]').forEach(el => {
    el.addEventListener('click', closeModal);
  });

  document.addEventListener('keydown', e => {
    if (e.key === 'Escape' && modal.classList.contains('open')) closeModal();
  });

  resultClose.addEventListener('click', closeModal);

  function loadPaymentSdk(url, integrity) {
    return new Promise((resolve, reject) => {
      const script = document.createElement('script');
      script.src = url;
      script.async = true;
      if (integrity) {
        script.integrity = integrity;
        script.crossOrigin = 'anonymous';
      }
      script.onload = resolve;
      script.onerror = () => reject(new Error('Failed to load payment SDK'));
      document.body.appendChild(script);
    });
  }

  function showResult(success, orderId) {
    resultIcon.innerHTML = success
      ? '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>'
      : '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M15 9l-6 6M9 9l6 6"/></svg>';
    resultIcon.className = 'sub-result-icon ' + (success ? 'success' : 'failed');
    resultTitle.textContent = success ? cfg.i18n.successTitle : cfg.i18n.failedTitle;
    resultText.textContent = success ? cfg.i18n.successText : cfg.i18n.failedText;
    showStep(stepResult);

    if (orderId) {
      fetch(cfg.resultUrlTemplate.replace('__ORDER_ID__', orderId), {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': cfg.csrf,
          'Accept': 'application/json',
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ status: success ? 'COMPLETED' : 'DECLINED' }),
      }).catch(() => {});
    }
  }

  form.addEventListener('submit', async e => {
    e.preventDefault();
    formError.style.display = 'none';

    const submitBtn = form.querySelector('button[type="submit"]');
    submitBtn.disabled = true;

    try {
      const res = await fetch(cfg.checkoutUrlTemplate.replace('__PLAN_ID__', currentPlanId), {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': cfg.csrf,
          'Accept': 'application/json',
        },
        body: new FormData(form),
      });

      const data = await res.json();

      if (!res.ok) {
        formError.textContent = data.message || cfg.i18n.initFailed;
        formError.style.display = 'block';
        submitBtn.disabled = false;
        return;
      }

      loadingText.textContent = cfg.i18n.processing;
      showStep(stepLoading);

      await loadPaymentSdk(data.clientLibrary, data.clientLibraryIntegrity);

      const accept = await window.Accept(data.token);
      const up = await accept.unifiedPayments();

      showStep(stepPayment);

      const transientToken = await up.show({
        containers: { paymentSelection: '#payment-form' },
      });

      showStep(stepLoading);
      loadingText.textContent = cfg.i18n.paying;

      const result = await up.complete(transientToken);
      showResult(result && result.status === 'COMPLETED', data.order_id);
    } catch (err) {
      showResult(false, null);
    } finally {
      submitBtn.disabled = false;
    }
  });
})();
