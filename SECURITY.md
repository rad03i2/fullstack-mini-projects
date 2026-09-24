# Security Policy

## Supported version
The latest commit on `main` is supported.

## Reporting
Please report suspected vulnerabilities privately through GitHub's private vulnerability reporting feature when available. Do not open a public issue containing exploit details or private task data.

## Scope and deployment
The application is designed primarily for local/small deployments. It implements CSRF protection, prepared SQL, output escaping, input constraints, and no third-party telemetry. Internet-facing operators remain responsible for HTTPS, authentication/access control, secure PHP/web-server configuration, filesystem permissions, and backups.
