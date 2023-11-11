export const computeClassText = (num) => {
    num = parseFloat(num);
    return num >= 0 ? 'text-success' : 'text-danger'
}