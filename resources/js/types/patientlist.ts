export interface PatientList {
    id: number;
    first_name: string;
    last_name: string;
    gender: string;
    dob: string;
    photo: string | null;
    dx: string;
    status: string;
}
