#include <stdio.h>

// write a program to check the grade of a student using switch case in C.

int main() {
    char grade;

    printf("Enter the grade (A, B, C, D, F): ");
    scanf(" %c", &grade);

    switch (grade) {
        case 'A':
            printf("Excellent!\n");
            break;
        case 'B':
            printf("Good job!\n");
            break;
        case 'C':
            printf("You passed.\n");
            break;
        case 'D':
            printf("You need to work harder.\n");
            break;
        case 'F':
            printf("Failed. Better luck next time.\n");
            break;
        default:
            printf("Invalid grade entered.\n");
            break;
    }

    return 0;
}


/*
* write the above code using if-else statements instead of switch-case.
*/

/*
#include <stdio.h>

int main() {
    char grade;

    printf("Enter the grade (A, B, C, D, F): ");
    scanf(" %c", &grade);

    if (grade == 'A') {
        printf("Excellent!\n");
    } else if (grade == 'B') {
        printf("Good job!\n");
    } else if (grade == 'C') {
        printf("You passed.\n");
    } else if (grade == 'D') {
        printf("You need to work harder.\n");
    } else if (grade == 'F') {
        printf("Failed. Better luck next time.\n");
    } else {
        printf("Invalid grade entered.\n");
    }

    return 0;
}
*/