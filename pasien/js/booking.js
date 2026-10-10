function selectDoctor(element) {
    document.querySelectorAll('.doctor-card').forEach(card => card.classList.remove('selected'));
    element.classList.add('selected');
}