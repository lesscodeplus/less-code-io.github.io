export function scorePassword(pass) {
    let score = 0;
    if (!pass)
        return score;

    let letters = new Object();
    for (let i=0; i<pass.length; i++) {
        letters[pass[i]] = (letters[pass[i]] || 0) + 1;
        score += 5.0 / letters[pass[i]];
    }

    const variations = {
        digits: /\d/.test(pass),
        lower: /[a-z]/.test(pass),
        upper: /[A-Z]/.test(pass),
        nonWords: /\W/.test(pass),
    }

    let variationCount = 0;
    for (var check in variations) {
        variationCount += (variations[check] == true) ? 1 : 0;
    }
    score += (variationCount - 1) * 10;

    return parseInt(score);
}

export function checkPassStrength(pass) {
    const score = scorePassword(pass);
    if (score > 80)
        return "strong";
    if (score > 60)
        return "good";
    if (score >= 30)
        return "weak";

    return "";
}

export function getColorForStrength(percentage) {
  if (percentage < 30) {
    return '#FF4949';
  } else if (percentage < 70) {
    return '#e6a23c';
  } else {
    return '#67c23a';
  }
}

export function showPasswordStrength(pass){
  const score = scorePassword(pass);
  if (score > 70){
    return 100;
  }else {
    return Math.round(score / 70  * 100);
  }
  
}

export function passwordValidator (rule, value, callback) {
    if (value === '') {
      callback(new Error('Please enter a password'));
    } else {
      const strength = showPasswordStrength(value);
      if (strength > 70){
        callback();
      }else {
        callback(new Error('Password should be at least 70% strong'));
      }
    }
}